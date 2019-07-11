<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Archivo;
use App\Enlace;

class Categoria extends Model
{
    //Uno a muchos
    //Una categoria puede tener muchos archivos
    public function archivos(){
        return $this->hasMany(Archivo::class);
    }

    //Uno a muchos
    //Una categoria puede tener muchos enlaces
    public function enlaces(){
        return $this->hasMany(Enlace::class);
    }
}
