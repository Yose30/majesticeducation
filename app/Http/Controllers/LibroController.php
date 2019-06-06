<?php

namespace App\Http\Controllers;

use Google_Service_Drive;
use Google_Client;
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
    
    public function contenido($id){
        $libro = Libro::whereId($id)->with('subsistemas', 'semestres')->first();
        $categorias = Categoria::all();
        $documentos = Documento::where('libro_id', $libro->id)->with('categoria')->get();
        $videos = Video::where('libro_id', $libro->id)->get();
        $links = Link::where('libro_id', $libro->id)->get();
        $songs = Song::where('libro_id', $libro->id)->get();

        return view('contenido', compact('libro', 'categorias', 'documentos', 'videos', 'links', 'songs'));
    }

    public function download($id){
        $audio = Song::whereId($id)->first();
        $client = new Google_Client();
        $service = new Google_Service_Drive($client);
        $results = $service->files->listFiles();
        dd($audio);
    }
}
