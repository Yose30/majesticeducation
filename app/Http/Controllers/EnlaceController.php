<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enlace;

class EnlaceController extends Controller
{
    //Guardar enlace
    public function store(Request $request){
        $this->validate($request, [
            'titulo'    => 'required|string|min:3|max:50',
            'url'       => 'url|min:12|max:200'
        ]);

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
}
