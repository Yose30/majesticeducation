<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Evaluacione;
use App\Seccione;

class EvaluacioneController extends Controller
{
    public function index(){
        $evaluaciones = Evaluacione::where('profesore_id', auth()->user()->profesore->id)
                                    ->with('preguntas')
                                    ->get();
        return response()->json($evaluaciones);
    }

    public function show(){
        $evaluacion_id = Input::get('evaluacion_id');
        $evaluacion = Evaluacione::whereId($evaluacion_id)->with('preguntas.respuestas')->first();
        return response()->json($evaluacion);
    }

    public function store(Request $request){
        \DB::beginTransaction();
        try{
            $evaluacion = Evaluacione::create([
                'profesore_id'  => auth()->user()->profesore->id,
                'titulo'        => $request->titulo
            ]);

            foreach($request->preguntas as $pregunta){
                $evaluacion->preguntas()->attach($pregunta['id']);
            }
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }

        return response()->json($evaluacion);
    }

    public function update(Request $request){
        $evaluacion = Evaluacione::find($request->id);

        \DB::beginTransaction();
        try{
            $evaluacion->update([
                'titulo' => $request->titulo
            ]);
            //Eliminar las preguntas de la evaluación
            foreach($request->eliminados as $eliminado){
                //Comprobar que la pregunta ya este guardada en la evaluación
                $exists = $evaluacion->preguntas()->where('pregunta_id', $eliminado['id'])->exists();
                if($exists){
                    $evaluacion->preguntas()->detach($eliminado['id']);
                }
            }
            //Agregar las preguntas
            foreach($request->nuevos as $nuevo){
                $evaluacion->preguntas()->attach($nuevo['id']);
            }
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        
        return response()->json($evaluacion);
    }

    public function save_selected(Request $request){
        $seccion = Seccione::find($request->seccion_id);
        $evaluacione = Evaluacione::whereId($request->evaluacione_id)->with('preguntas.respuestas')->first();
        
        try{
            \DB::beginTransaction();
            $seccion->update(['evaluacione_id' => $evaluacione->id]);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }

        return response()->json($evaluacione);

        // $evaluaciones = $seccion->evaluaciones;
        // $count = 0;
        // foreach($evaluaciones as $evaluacione){
        //     if($evaluacione->id == $request->evaluacione){
        //         $count ++;
        //     }
        // }

        // if($count > 0){
        //     $jsondata['status'] = 422;
        //     $jsondata['message'] =  'La evaluacion ya se encuentra guardada en la unidad';
        //     return response()->json($jsondata);
        // }
        // else{
        //     try{
        //         \DB::beginTransaction();
        //             $evaluacione = Evaluacione::whereId($request->evaluacione_id)->first();
        //             $seccion->evaluaciones()->attach($evaluacione->id, ['titulo' => $evaluacione->titulo]);
        //             $dato = [
        //                 'id' => $evaluacione->id,
        //                 'titulo' => $evaluacione->titulo,
        //                 'pivot' => [
        //                     'titulo' => $evaluacione->titulo
        //                 ]
        //             ];
        //         \DB::commit();
        //     } catch (Exception $e) {
        //         \DB::rollBack();
        //         return response()->json($exception->getMessage());
        //     }
            
        //     return response()->json($dato);
        // }
    }

    public function contenido_evaluacion(){
        $evaluacione_id = Input::get('evaluacione_id');
        $evaluacione = Evaluacione::whereId($evaluacione_id)->with('preguntas.respuestas')->first();
        return response()->json($evaluacione);
    }
    
}
