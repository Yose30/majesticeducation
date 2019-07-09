<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Libro;
use App\Categoria;
use App\Seccione;

class Documento extends Model
{
    protected $fillable = [
        'id', 'seccione_id', 'titulo', 'public_url', 'size', 'extension'
    ];

    //Uno a muchos (Inversa)
    //Un documento solo puede pertencer a una sección
    public function seccione(){
        return $this->belongsTo(Seccione::class);
    }

    //Uno a muchos (Inversa)
    //Un documento solo puede pertencer a una categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Obtener el tamaño del archivo
    public function getSizeInKbAttribute(){
        return number_format($this->size / 1024, 1);
    }
}
