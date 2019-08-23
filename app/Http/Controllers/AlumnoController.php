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
        $clase = Clase::whereSlug($slug)
                    ->with(['secciones.archivos', 'secciones.enlaces', 'secciones.evaluacione.resultados'])->first();
        return view('alumno.contenido', compact('clase'));
    }
}
