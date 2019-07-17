<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clase;
use App\User;

class Alumno extends Model
{
    //Muchos a muchos
    //Un alumno puede unirse a muchas clases
    public function clases(){
        return $this->belongsToMany(Clase::class);
    }

    //Uno a uno (Inversa)
    //Un alumno puede tener un solo usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
