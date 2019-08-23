<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use App\Seccione;
use App\Archivo;
use App\Enlace;
use App\Clase;

class ClaseController extends Controller
{
    public function __construct(){
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

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
                    'profesore_id'   => auth()->user()->profesore->id,
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
        $this->validar_unidad($request);
        try{
            \DB::beginTransaction();
                $seccion = Seccione::create($request->input());
            \DB::commit();
            return response()->json($seccion);
        }
        catch(Exception $e){
            \DB::rollBack();
            return response()->json($e);
        }
    }

    //Editar unidad
    public function editar_unidad(Request $request){
        $this->validar_unidad($request);
        try{
            \DB::beginTransaction();
                $seccion = Seccione::whereId($request->id)->first();
                $seccion->seccion = $request->seccion;
                $seccion->slug = str_slug($request->seccion, "-");
                $seccion->save();
            \DB::commit();
            return response()->json($seccion);
        }
        catch(Exception $e){
            \DB::rollBack();
            return response()->json($e);
        }
    }

    //Eliminar unidad
    public function eliminar_unidad(){
        $id = Input::get('id');
        // Buscar unidad
        $seccion = Seccione::whereId($id)->first();
        //Obtener las relaciones de archivos y enlaces con la unidad
        // $relaciones1 = \DB::table('archivo_seccione')->where('seccione_id', '=', $seccion->id)->get();
        // $relaciones2 = \DB::table('enlace_seccione')->where('seccione_id', '=', $seccion->id)->get();

        // Declarar la ubicacion principal donde se ubican los archivos
        $ubicacion = $seccion->clase->nombre.'/'.$seccion->seccion.'/';
        try{
            \DB::beginTransaction();
            if($seccion->archivos->count() > 0){
                //Almacenar los ids de los archivos y los registros de cada uno
                $ids = array();
                foreach($seccion->archivos as $archivo){
                    // Borrar los archivos de dropbox
                    // if($archivo->categoria_id == 1)
                    //     $this->dropbox->delete('/Documentos/'.$ubicacion.$archivo->name);
                    // if($archivo->categoria_id == 2)
                    //     $this->dropbox->delete('/Audios/'.$ubicacion.$archivo->name);
                    // if($archivo->categoria_id == 3)
                    //     $this->dropbox->delete('/Videos/'.$ubicacion.$archivo->name);
                    array_push($ids, $archivo->id); 
                }
                // Borrar las relaciones de archivos
                // $seccion->archivos()->detach();

                // // Borrar los registros de los archivos
                // $pruebas = Archivo::whereIn('id', $ids)->get();  
                
                return response()->json($ids);
            }
            if($relaciones2->count() > 0){
                //Almacenar los registros de enlaces
                $enlaces = array();
                foreach($relaciones2 as $relacion){
                    $enlace_datos = Enlace::whereId($relacion->enlace_id)->first();
                    array_push($enlaces, $enlace_datos);
                }
                
                //Borrar las relaciones
                \DB::table('enlace_seccione')->where('seccione_id', '=', $seccion->id)->delete();
                //Borrar los registros de enlaces
                foreach($enlaces as $enlace){
                    Enlace::whereId($enlace->id)->delete();
                }
            }
            //Borrar la unidad
            $seccion->delete();
            \DB::commit();
        }
        catch(Exception $e){
            \DB::rollBack();
            return response()->json($e);
        }
        return response()->json(null, 200);
    }

    //Unir clase
    public function unir_clase(Request $request){
        $this->validate(request(), [
            'codigo' => 'required|min:5|max:10|string'
        ]);

        $alumno = auth()->user()->alumno;
        $clase = Clase::where('codigo', $request->codigo)->first();
        
        if($clase != null){
            $registrado = $alumno->clases->where('id', $clase->id)->first();
            if($registrado != null){
                return back()->with('message', ['warning', __("Ya tienes registrada esta clase")]);
            }
            else{
                $alumno->clases()->attach($clase->id, ['alumno_id' => $alumno->id]);
                return back()->with('message', ['success', __("Clase guardada")]);
            }
        }
        else{
            return back()->with('message', ['warning', __("El codigo de la clase no existe")]);
        }
    }

    //Validar unidad
    public function validar_unidad($request){
        $this->validate($request, [
            'seccion'    => 'required|string|min:7|max:50',
        ]);
    }
}
