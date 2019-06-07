<?php

namespace App\Http\Controllers;

use Google_Service_Drive;
use Google_Client;
use Google_Service_Drive_DriveFile;
use Illuminate\Http\Request;
use App\Libro;
use App\Documento;
use App\Video;
use App\Link; 
use App\Song;
use App\Categoria;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    private $drive;
    public function __construct(Google_Client $client)
    {
        $this->middleware(function ($request, $next) use ($client) {
            $client->refreshToken(Auth::user()->refresh_token);
            $this->drive = new Google_Service_Drive($client);
            return $next($request);
        });
    }
    
    public function contenido($id){
        $libro = Libro::whereId($id)->with('subsistemas', 'semestres')->first();
        $categorias = Categoria::all();
        $documentos = Documento::where('libro_id', $libro->id)->with('categoria')->get();
        $videos = Video::where('libro_id', $libro->id)->get();
        $links = Link::where('libro_id', $libro->id)->get();
        $songs = Song::where('libro_id', $libro->id)->get();

        return view('contenido', compact('libro', 'categorias', 'documentos', 'videos', 'links', 'songs'));
    }

    public function download(){
        $client = new Google_Client();
        $driveService = new Google_Service_Drive($client);
        $fileId = '0B4lctXErlSvzSXVUd3pZelVoakU';
        $response = $driveService->files->export($fileId, 'application/pdf', array(
            'alt' => 'media'));
        $content = $response->getBody()->getContents();
        // $audio = Song::whereId(1)->first();
        // $client = new Google_Client();
        // $client->addScope("https://www.googleapis.com/auth/drive");
        // $client->createAuthUrl();
        // dd($client->createAuthUrl());
        // $service = new Google_Service_Drive($client);
        // $results = $service->files->listFiles();
        // $client = new Google_Client();
        // $client->useApplicationDefaultCredentials();
        // $client->addScope(Google_Service_Plus::PLUS_ME);
        // $httpClient = $client->authorize();
        // $response = $httpClient->get('https://www.googleapis.com/plus/v1/people/me');
    }
}
