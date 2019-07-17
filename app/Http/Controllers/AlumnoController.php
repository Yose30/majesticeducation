<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccione;
use App\Clase;

class AlumnoController extends Controller
{
    public function index(){
        return view('alumno.inicio');
    }

    public function contenido_clase($slug){
        $clase = Clase::whereSlug($slug)->first();
        $secciones = Seccione::where('clase_id', $clase->id)->with('archivos')->with('enlaces')->get();
        return view('alumno.contenido', compact('clase', 'secciones'));
    }
}
