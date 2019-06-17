<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;
use App\Documento;
use App\Video;
use App\Link; 
use App\Song;
use App\Categoria;
use App\Subsistema;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

}
