<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Libro;
use App\Categoria;

class Documento extends Model
{
    //Uno a muchos (Inversa)
    //Un documento solo puede pertencer a un libro
    public function libro(){
        return $this->belongsTo(Libro::class);
    }

    //Uno a muchos (Inversa)
    //Un documento solo puede pertencer a una categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
