<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('profesor.contenido', compact('clase'));
    }
}
