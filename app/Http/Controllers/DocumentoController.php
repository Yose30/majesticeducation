<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Dropbox\Client;
use Illuminate\Support\Facades\Storage;
use App\Clase;

class DocumentoController extends Controller
{
    public function __construct(){
        // Necesitamos obtener una instancia de la clase Client la cual tiene algunos métodos
        // que serán necesarios.
        $this->dropbox = Storage::disk('dropbox')->getDriver()->getAdapter()->getClient();   
    }

    public function store(Request $request){
        // Guardamos el archivo indicando el driver y el método putFileAs el cual recibe
        // el directorio donde será almacenado, el archivo y el nombre.
        // ¡No olvides validar todos estos datos antes de guardar el archivo!
        // Storage::disk('dropbox')->putFileAs(
        //     '/Aplicaciones/PlataformaME/Documentos/', 
        //     $request->file('file'), 
        //     $request->file('file')->getClientOriginalName()
        // );
        // // Creamos el enlace publico en dropbox utilizando la propiedad dropbox
        // // definida en el constructor de la clase y almacenamos la respuesta.
        // $response = $this->dropbox->createSharedLinkWithSettings(
        //     '/Aplicaciones/PlataformaME/Documentos/'.$request->file('file')->getClientOriginalName(), 
        //     ["requested_visibility" => "public"]
        // );
        // // Creamos un nuevo registro en la tabla files con los datos de la respuesta.
        // $documento = Documento::create([
        //     'titulo' => $response['titulo'],
        //     'extension' => $request->file('file')->getClientOriginalExtension(),
        //     'size' => $response['size'],
        //     'public_url' => $response['url']
        // ]);
        
        // Retornamos un redirección hacía atras
        // return response()->json($request);
    }
}
