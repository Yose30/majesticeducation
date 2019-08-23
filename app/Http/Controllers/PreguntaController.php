<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
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

            foreach($request->respuestas as $respuesta) {
                $this->func_crear($pregunta, $respuesta);
            }

            $respuestas = $pregunta->respuestas;
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json(['pregunta' => $pregunta, 'respuestas' => $respuestas]);
    }

    //Actualizar pregunta
    public function update(Request $request){
        $pregunta = Pregunta::find($request->id);
        try{
            \DB::beginTransaction();
                $pregunta->update(['pregunta' => $request->pregunta]);

                foreach($request->eliminados as $eliminado){
                    Respuesta::whereId($eliminado['id'])->delete();
                }

                foreach($request->nuevos as $nuevo){
                    $this->func_crear($pregunta, $nuevo);
                }

                $respuestas = $pregunta->respuestas;
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }

        return response()->json(['pregunta' => $pregunta, 'respuestas' => $respuestas]);
    }

    public function func_crear($pregunta, $respuesta){
        Respuesta::create([
            'pregunta_id'   => $pregunta->id,
            'respuesta'     => $respuesta['respuesta'],
            'valor'         => $respuesta['valor']
        ]);
    }
}
