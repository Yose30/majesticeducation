<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use App\Seccione;
use App\Archivo;
use App\Clase;

class ArchivoController extends Controller
{
    public function __construct(){
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function store_documento(Request $request){
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:100',
            'file' => 'required|mimes:pdf,xls,xlsx,doc,docx|max:2000'
        ]);
        
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/profesore_id'.auth()->user()->profesore->id.'/Documentos/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El archivo ya se encuentra guardado';
            return response()->json($jsondata);
        }

        $this->insertar($request, 'Documentos');

        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/profesore_id'.auth()->user()->profesore->id.'/Documentos/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        $url = $this->remplazar($response['url'], $request);
        try{
            \DB::beginTransaction();
            $archivo = Archivo::create([
                'profesore_id' => auth()->user()->profesore->id,
                'categoria_id' =>  1,
                'titulo' => $request->titulo,
                'name' => $response['name'],
                'public_url' => $url,
                'size' => $response['size'],
                'extension' => $request->file('file')->getClientOriginalExtension()
            ]);

            //Insertar en la tabla pivote
            if($request->seccione_id != 'undefined'){
                $archivo->secciones()->attach($request->seccione_id, ['titulo' => $request->titulo]);
            }
            $dato = $this->datos_array($archivo);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        
        return response()->json($dato);
    }

    public function remplazar($resposeUrl, $request){
        $url = $resposeUrl;
        $extension = $request->file('file')->getClientOriginalExtension();
        // Creamos un nuevo registro en la tabla archivos con los datos de la respuesta.
        if($extension == 'pdf' || $extension == 'mp4'){
            $quitar = str_replace('?dl=0', '', $url);
            $url = str_replace('www', 'dl', $quitar);
        }
        return $url;
    }

    //Actualizar el archivo
    public function update_documento(Request $request){
        $archivo = Archivo::whereId($request->archivo_id)->first();
        $this->validar($request);
        if($request->file != null){
            $this->validate($request, [
                'file' => 'required|mimes:pdf,xls,xlsx,doc,docx|max:2000'
            ]);
            if(Storage::disk('dropbox')
                ->exists('/profesore_id'.auth()->user()->profesore->id.'/Documentos/'.$request->file('file')->getClientOriginalName())){
                $jsondata['status'] = 422;
                $jsondata['message'] =  'El archivo ya se encuentra guardado';
                return response()->json($jsondata);
            }
            $this->dropbox->delete('/profesore_id'.auth()->user()->profesore->id.'/Documentos/'.$archivo->name);
            $this->insertar($request, 'Documentos');
            $response = $this->dropbox->createSharedLinkWithSettings(
                '/profesore_id'.auth()->user()->profesore->id.'/Documentos/'.$request->file('file')->getClientOriginalName(), 
                ["requested_visibility" => "public"]
            );
            
            $url = $this->remplazar($response['url'], $request);
            $archivo->name = $response['name']; 
            $archivo->public_url = $url; 
            $archivo->size = $response['size']; 
            $archivo->extension = $request->file('file')->getClientOriginalExtension(); 
        }
        $archivo->titulo = $request->titulo; 
        $archivo->save();
        return response()->json($archivo);
    }

    //Guardar audio
    public function store_audio(Request $request){
        $this->validar($request);
        $seccion = Seccione::whereId($request->seccione_id)->first();
        if(Storage::disk('dropbox')
            ->exists('/profesore_id'.auth()->user()->profesore->id.'/Audios/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El audio ya se encuentra guardado';
            return response()->json($jsondata);
        }
        $this->insertar($request, 'Audios');

        $response = $this->dropbox->createSharedLinkWithSettings(
            '/profesore_id'.auth()->user()->profesore->id.'/Audios/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        $url = $this->remplazar($response['url'], $request);
        try{
            \DB::beginTransaction();
            $archivo = Archivo::create([
                'profesore_id' => auth()->user()->profesore->id,
                'categoria_id' =>  2,
                'titulo' => $request->titulo,
                'public_url' => $url,
                'name' => $response['name'],
                'size' => $response['size'],
                'extension' => $request->file('file')->getClientOriginalExtension()
            ]);

            //Insertar en la tabla pivote
            $archivo->secciones()->attach($seccion->id, ['titulo' => $request->titulo]);
            $dato = $this->datos_array($archivo);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($dato);
    }

    //Actualizar audio
    public function update_audio(Request $request){
        // $seccion = Seccione::whereId($request->seccione_id)->first();
        $archivo = Archivo::whereId($request->archivo_id)->first();
        $this->validar($request);
        if($request->file != null){
            if(Storage::disk('dropbox')
                ->exists('/profesore_id'.auth()->user()->profesore->id.'/Audios/'.$request->file('file')->getClientOriginalName())){
                $jsondata['status'] = 422;
                $jsondata['message'] =  'El audio ya se encuentra guardado';
                return response()->json($jsondata);
            }
            $this->dropbox->delete('/profesore_id'.auth()->user()->profesore->id.'/Audios/'.$archivo->name);
            $this->insertar($request, 'Audios');
            $response = $this->dropbox->createSharedLinkWithSettings(
                '/profesore_id'.auth()->user()->profesore->id.'/Audios/'.$request->file('file')->getClientOriginalName(), 
                ["requested_visibility" => "public"]
            );
            $url = $this->remplazar($response['url'], $request);
            $archivo->name = $response['name']; 
            $archivo->public_url = $url; 
            $archivo->size = $response['size']; 
            $archivo->extension = $request->file('file')->getClientOriginalExtension(); 
        }
        $archivo->titulo = $request->titulo; 
        $archivo->save();
        return response()->json($archivo);
    }

    //Guardar video
    public function store_video(Request $request){
        //Validacion de los datos
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:100',
            'file' => 'required|mimes:mp4|max:5000'
        ]);

        $seccion = Seccione::whereId($request->seccione_id)->first();

        if(Storage::disk('dropbox')
            ->exists('/profesore_id'.auth()->user()->profesore->id.'/Videos/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El video ya se encuentra guardado';
            return response()->json($jsondata);
        }

        $this->insertar($request, 'Videos');

        $response = $this->dropbox->createSharedLinkWithSettings(
            '/profesore_id'.auth()->user()->profesore->id.'/Videos/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        $url = $this->remplazar($response['url'], $request);
        try{
            \DB::beginTransaction();
            // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
            $archivo = Archivo::create([
                'profesore_id' => auth()->user()->profesore->id,
                'categoria_id' =>  3,
                'titulo' => $request->titulo,
                'public_url' => $url,
                'name' => $response['name'],
                'size' => $response['size'],
                'extension' => $request->file('file')->getClientOriginalExtension()
            ]);
            //Insertar en la tabla pivote
            $archivo->secciones()->attach($seccion->id, ['titulo' => $request->titulo]);
            $dato = $this->datos_array($archivo);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($dato);
    }

    public function update_video(Request $request){
        // $seccion = Seccione::whereId($request->seccione_id)->first();
        $archivo = Archivo::whereId($request->archivo_id)->first();
        $this->validar($request);
        if($request->file != null){
            $this->validate($request, [
                'file' => 'required|mimes:mp4|max:5000'
            ]);
            if(Storage::disk('dropbox')
                ->exists('/profesore_id'.auth()->user()->profesore->id.'/Videos/'.$request->file('file')->getClientOriginalName())){
                $jsondata['status'] = 422;
                $jsondata['message'] =  'El video ya se encuentra guardado';
                return response()->json($jsondata);
            }
            $this->dropbox->delete('/profesore_id'.auth()->user()->profesore->id.'/Videos/'.$archivo->name);
            $this->insertar($request, 'Videos');
            $response = $this->dropbox->createSharedLinkWithSettings(
                '/profesore_id'.auth()->user()->profesore->id.'/Videos/'.$request->file('file')->getClientOriginalName(), 
                ["requested_visibility" => "public"]
            );
            $url = $this->remplazar($response['url'], $request);
            $archivo->name = $response['name']; 
            $archivo->public_url = $url; 
            $archivo->size = $response['size']; 
            $archivo->extension = $request->file('file')->getClientOriginalExtension(); 
        }
        $archivo->titulo = $request->titulo; 
        $archivo->save();
        return response()->json($archivo);
    }

    //Borrar archivo de la unidad
    public function borrar_archivo(){
        $seccion_id = Input::get('seccion_id');
        $id = Input::get('id');
        $seccion = Seccione::whereId($seccion_id)->first();
        try{
            \DB::beginTransaction();
            // Eliminamos el registro de nuestra tabla
            $seccion->archivos()->detach($id);
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json(null, 200);
    }

    //Borrar el archivo
    public function destroy(){
        $id = Input::get('id');
        $archivo = Archivo::whereId($id)->first();
        $ubicacion = '/profesore_id'.auth()->user()->profesore->id;
        // Eliminamos el archivo en dropbox llamando a la clase instanciada en la propiedad dropbox.
        if($archivo->categoria_id == 1){
            $this->dropbox->delete($ubicacion.'/Documentos/'.$archivo->name);
        }
        if($archivo->categoria_id == 2){
            $this->dropbox->delete($ubicacion.'/Audios/'.$archivo->name);
        }
        if($archivo->categoria_id == 3){
            $this->dropbox->delete($ubicacion.'/Videos/'.$archivo->name);
        }
        try{
            \DB::beginTransaction();
            // Eliminamos el registro de las unidades
            $archivo->secciones()->detach();
            $archivo->delete();
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollBack();
            return response()->json($exception->getMessage());
        }
        return response()->json($ubicacion);
    }

    //Descargar archivo
    public function download($id){
        $archivo = Archivo::whereId($id)->first();
        $ubicacion = '/profesore_id'.auth()->user()->profesore->id;
        // Retornamos una descarga especificando el driver dropbox
        // e indicándole al método download el nombre del archivo.
        if($archivo->categoria_id == 1){
            return Storage::disk('dropbox')->download($ubicacion.'/Documentos/'.$archivo->name);
        }
        if($archivo->categoria_id == 2){
            return Storage::disk('dropbox')->download($ubicacion.'/Audios/'.$archivo->name);
        }
        if($archivo->categoria_id == 3){
            return Storage::disk('dropbox')->download($ubicacion.'/Videos/'.$archivo->name);
        }
    }

    //Función para validar el archivo
    public function validar($request){
        //Validacion de los datos
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:100',
        ]);
    }

    //Función para insertar el archivo en Dropbox
    public function insertar($request, $carpeta){
        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/profesore_id'.auth()->user()->profesore->id.'/'.$carpeta.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
    }

    public function save_selected(Request $request){
        $seccion = Seccione::find($request->seccion_id);
        $archivos = $seccion->archivos;

        $count = 0;
        foreach($archivos as $archivo){
            if($archivo->id == $request->archivo_id){
                $count ++;
            }
        }

        if($count > 0){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El archivo ya se encuentra guardado en la unidad';
            return response()->json($jsondata);
        }
        else{
            try{
                \DB::beginTransaction();
                    $archivo = Archivo::whereId($request->archivo_id)->first();
                    $seccion->archivos()->attach($archivo->id, ['titulo' => $archivo->titulo]);
                    $dato = $this->datos_array($archivo);
                \DB::commit();
            } catch (Exception $e) {
                \DB::rollBack();
                return response()->json($exception->getMessage());
            }
            
            return response()->json($dato);
        }
    }

    public function datos_array($archivo){
        $dato = [
            'id' => $archivo->id,
            'categoria_id' => $archivo->categoria_id,
            'titulo' => $archivo->titulo,
            'public_url' => $archivo->public_url,
            'pivot' => [
                'titulo' => $archivo->titulo
            ]
        ];

        return $dato;
    }
}
