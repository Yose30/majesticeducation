<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Clase;
use App\Seccione;

class ClaseController extends Controller
{
    //Función para crear nueva clase
    public function store(){
        //Valida si el nombre de la clase no existe
        $validator = Validator::make(\request()->all(), [
            'nombre' => 'unique:clases'
        ]);

        if($validator->fails()){
            return back()->with('message', ['warning', __("La clase ya existe")]);
        }

        try{
            \DB::beginTransaction();
                //Genera el codigo aleatorio
                $codigo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);

                $clase = Clase::create([
                    'user_id'   => auth()->user()->id,
                    'nombre'    => \request()->nombre,
                    'codigo'    => $codigo
                ]);
            \DB::commit();
        }
        catch(Exception $e){
            \DB::rollBack();
            return back()->with('message', ['danger', __("Ocurrio un problema, intenta de nuevo")]);
        }

        return redirect()->route('profesor.contenido', $clase->slug)->with('message', ['success', __("Clase creada")]);
    }

    //Funcion para crear una nueva unidad
    public function nueva_unidad(Request $request){
        $seccion = Seccione::create($request->input());
        return response()->json($seccion);
    }
}
