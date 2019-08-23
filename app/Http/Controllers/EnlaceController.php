<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Enlace;

class EnlaceController extends Controller
{
    //Guardar enlace
    public function store(Request $request){
        $this->validar($request);
        try{
            \DB::beginTransaction();
                $enlace = Enlace::create([
                    'profesore_id' => auth()->user()->profesore->id,
                    'categoria_id' => $request->categoria_id,
                    'titulo'    => $request->titulo,
                    'url'       => $request->url
                ]);
                //Insertar en la tabla pivote
                if($request->seccione_id != 'undefined'){
                    $enlace->secciones()->attach((integer) $request->seccione_id);
                }  
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($enlace);
    }

    //Borrar enlace de la unidad
    public function destroy(){
        $id = Input::get('id');
        $enlace = Enlace::whereId($id)->first();
        $enlace->secciones()->detach();
        $enlace->delete();
        return response()->json(null, 200);
    }

    //Borrar enlace de la unidad
    public function borrar_enlace(){
        $seccion_id = Input::get('seccion_id');
        $id = Input::get('id');
        $seccion = Seccione::whereId($seccion_id)->first();
        $seccion->enlaces()->detach($id);
        return response()->json(null, 200);
    }

    public function update(Request $request){
        $this->validar($request);
        $enlace = Enlace::find($request->id);
        try{
            \DB::beginTransaction();
               $enlace->titulo = $request->titulo;
               $enlace->url = $request->url;
               $enlace->save();
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($enlace);
    }

    public function validar($request){
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:50',
            'url'       => 'url|min:12|max:500'
        ]);
    }
}
