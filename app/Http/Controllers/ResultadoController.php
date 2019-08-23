<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Resultado;

class ResultadoController extends Controller
{
    public function store(Request $request){
        $count_preguntas = 0;
        $count_correctas = 0;

        foreach($request->preguntas as $pregunta){
            $count_preguntas ++;
            if($pregunta['respuesta_base'] == 'Correcto'){
                $count_correctas ++;
            }
        }

        $calificacion = (10 / $count_preguntas) * $count_correctas;

        try{
            \DB::beginTransaction();
            $resultado = Resultado::create([
                'alumno_id' => auth()->user()->alumno->id,
                'evaluacione_id' => $request->id,
                'calificacion' => $calificacion
            ]);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($resultado);
    }

    public function obtener_resultado(){
        $evaluacione_id = Input::get('evaluacione_id');
        $resultado = Resultado::where([
            'alumno_id' => auth()->user()->alumno->id,
            'evaluacione_id' => $evaluacione_id
        ])->first();
        return response()->json($resultado);
    }
}
