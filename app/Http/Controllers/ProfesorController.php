<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccione;
use App\Clase;

class ProfesorController extends Controller
{
    //Pagina principal
    public function index(){
        return view('profesor.inicio');
    }

    //Mostrar el contenido de la clase
    public function contenido_clase($slug){
        $clase = Clase::whereSlug($slug)->first();
        $secciones = Seccione::where('clase_id', $clase->id)->with('archivos')->with('enlaces')->get();
        return view('profesor.contenido', compact('clase', 'secciones'));
    }
}
