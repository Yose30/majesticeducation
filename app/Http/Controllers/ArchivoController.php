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
        //Validacion de los datos
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:100',
            'file' => 'required|mimes:pdf,xls,xlsx,doc,docx,ppt,pptx|max:2000'
        ]);
        
        $seccion = Seccione::whereId($request->seccione_id)->first();
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/Documentos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El archivo ya existe en la unidad';
            return response()->json($jsondata);
        }

        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/Documentos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/Documentos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        // Creamos un nuevo registro en la tabla archivos con los datos de la respuesta.
        $archivo = Archivo::create([
            'categoria_id' =>  1,
            'titulo' => $request->titulo,
            'name' => $response['name'],
            'public_url' => $response['url'],
            'size' => $response['size'],
            'extension' => $request->file('file')->getClientOriginalExtension()
        ]);

        //Insertar en la tabla pivote
        $archivo->secciones()->attach($seccion->id);
        
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
        
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/Videos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El video ya existe en la unidad';
            return response()->json($jsondata);
        }
        
        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/Videos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/Videos/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
        $archivo = Archivo::create([
            'categoria_id' =>  3,
            'titulo' => $request->titulo,
            'public_url' => $response['url'],
            'name' => $response['name'],
            'size' => $response['size'],
            'extension' => $request->file('file')->getClientOriginalExtension()
        ]);

        //Insertar en la tabla pivote
        $archivo->secciones()->attach($seccion->id);
        
        return response()->json($archivo);
    }

    //Guardar audio
    public function store_audio(Request $request){
        //Validacion de los datos
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:100',
            'file' => 'required|mimes:mp4|max:3000'
        ]);

        $seccion = Seccione::whereId($request->seccione_id)->first();
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/Audios/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El audio ya existe en la unidad';
            return response()->json($jsondata);
        }

        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/Audios/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/Audios/'.$seccion->clase->nombre.'/'.$seccion->seccion.'/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
        $archivo = Archivo::create([
            'categoria_id' =>  2,
            'titulo' => $request->titulo,
            'public_url' => $response['url'],
            'name' => $response['name'],
            'size' => $response['size'],
            'extension' => $request->file('file')->getClientOriginalExtension()
        ]);

        //Insertar en la tabla pivote
        $archivo->secciones()->attach($seccion->id);
        
        return response()->json($archivo);
    }

    //Borrar archivo
    public function destroy(){
        $seccion_id = Input::get('seccion_id');
        $id = Input::get('id');

        $seccion = Seccione::whereId($seccion_id)->first();
        $archivo = Archivo::whereId($id)->first();
        $ubicacion = $seccion->clase->nombre.'/'.$seccion->seccion.'/'.$archivo->name;
        // Eliminamos el archivo en dropbox llamando a la clase
        // instanciada en la propiedad dropbox.
        if($archivo->categoria_id == 1){
            $this->dropbox->delete('/Documentos/'.$ubicacion);
        }
        if($archivo->categoria_id == 2){
            $this->dropbox->delete('/Audios/'.$ubicacion);
        }
        // Eliminamos el registro de nuestra tabla.
        $archivo->delete();
        return response()->json(null, 200);
    }

    //Descargar archivo
    public function download($seccion_id, $id){
        $seccion = Seccione::whereId($seccion_id)->first();
        $archivo = Archivo::whereId($id)->first();
        $ubicacion = $seccion->clase->nombre.'/'.$seccion->seccion.'/'.$archivo->name;
        // Retornamos una descarga especificando el driver dropbox
        // e indicándole al método download el nombre del archivo.
        if($archivo->categoria_id == 1){
            return Storage::disk('dropbox')->download('/Documentos/'.$ubicacion);
        }
        if($archivo->categoria_id == 2){
            return Storage::disk('dropbox')->download('/Audios/'.$ubicacion);
        }
    }
}
