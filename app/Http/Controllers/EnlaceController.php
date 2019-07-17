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
                $enlace = Enlace::create($request->input());
                //Insertar en la tabla pivote
                $enlace->secciones()->attach((integer) $request->seccione_id);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
    
        return response()->json($enlace);
    }

    //Borrar enlace
    public function destroy(){
        $seccion_id = Input::get('seccion_id');
        $id = Input::get('id');
        \DB::table('enlace_seccione')
            ->where('seccione_id', '=', $seccion_id)
            ->where('enlace_id', '=', $id)
            ->delete();
        $enlace = Enlace::whereId($id)->delete();
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
            'url'       => 'url|min:12|max:200'
        ]);
    }
}
