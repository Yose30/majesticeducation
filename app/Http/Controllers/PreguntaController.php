<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Pregunta;

class PreguntaController extends Controller
{
    //Guardar pregunta
    public function store(Request $request){
        try{
            \DB::beginTransaction();
            $pregunta = Pregunta::create([
                'profesore_id'  => auth()->user()->profesore->id,
                'pregunta'      => $request->pregunta
            ]);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($pregunta);
    }
}
