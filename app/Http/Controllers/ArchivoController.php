<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
            'file' => 'required|mimes:pdf,xls,xlsx,doc,docx,ppt,pptx|max:9000'
        ]);
        
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/Documentos/'.$request->seccione_id.'/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El archivo ya existe en la unidad';
            return response()->json($jsondata);
        }

        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/Documentos/'.$request->seccione_id.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/Documentos/'.$request->seccione_id.'/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        // Creamos un nuevo registro en la tabla archivos con los datos de la respuesta.
        $archivo = Archivo::create([
            'categoria_id' =>  1,
            'titulo' => $request->titulo,
            'public_url' => $response['url'],
            'size' => $response['size'],
            'extension' => $request->file('file')->getClientOriginalExtension()
        ]);

        //Insertar en la tabla pivote
        $archivo->secciones()->attach((integer) $request->seccione_id);
        
        return response()->json($archivo);
    }

    //Guardar audio
    public function store_audio(Request $request){
        //Comprueba que el archivo no exista en la carpeta
        if(Storage::disk('dropbox')
            ->exists('/Audios/'.$request->seccione_id.'/'.$request->file('file')->getClientOriginalName())){
            $jsondata['status'] = 422;
            $jsondata['message'] =  'El audio ya existe en la unidad';
            return response()->json($jsondata);
        }

        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        Storage::disk('dropbox')->putFileAs(
            '/Audios/'.$request->seccione_id.'/', 
            $request->file('file'), 
            $request->file('file')->getClientOriginalName()
        );
        // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // definida en el constructor de la clase y almacenamos la respuesta.
        $response = $this->dropbox->createSharedLinkWithSettings(
            '/Audios/'.$request->seccione_id.'/'.$request->file('file')->getClientOriginalName(), 
            ["requested_visibility" => "public"]
        );
        // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
        $archivo = Archivo::create([
            'categoria_id' =>  2,
            'titulo' => $request->titulo,
            'public_url' => $response['url'],
            'size' => $response['size'],
            'extension' => $request->file('file')->getClientOriginalExtension()
        ]);

        //Insertar en la tabla pivote
        $archivo->secciones()->attach((integer) $request->seccione_id);
        
        return response()->json($archivo);
    }
}
