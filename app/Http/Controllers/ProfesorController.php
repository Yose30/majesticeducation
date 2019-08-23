<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluacione;
use App\Seccione;
use App\Pregunta;
use App\Archivo;
use App\Enlace;
use App\Clase;

class ProfesorController extends Controller
{   
    // Pagina principal
    public function index(){
        return view('profesor.inicio');
    }

    // Mostrar el contenido de la clase
    public function contenido_clase($slug){
        $clase = Clase::whereSlug($slug)
                    ->with(['secciones.archivos', 'secciones.enlaces', 'secciones.evaluacione'])->first();
        return view('profesor.contenido', compact('clase')); 
    }

    // Obtener las preguntas que el profesor haya creado
    public function contenido_evaluaciones(){
        $preguntas = Pregunta::where('profesore_id', auth()->user()->profesore->id)->with('respuestas')->get();
        return view('profesor.evaluaciones', compact('preguntas'));
    }

    //Obtener la vista de recursos
    public function contenido_recursos(){
        return view('profesor.recursos'); 
    }

    //Obtener los recursos que el profesor haya subido
    public function recursos_profesor(){
        $archivos = Archivo::where(['profesore_id' => auth()->user()->profesore->id, ])->get();
        $enlaces = Enlace::where(['profesore_id' => auth()->user()->profesore->id, ])->get();
        $evaluaciones = Evaluacione::where(['profesore_id' => auth()->user()->profesore->id, ])->get();
        return response()->json(['archivos' => $archivos, 'enlaces' => $enlaces, 'evaluaciones' => $evaluaciones]);
    }
}
