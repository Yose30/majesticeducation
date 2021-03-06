<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evaluacione;
use App\Pregunta;
use App\Archivo;
use App\Enlace;
use App\Clase;
use App\User;

class Profesore extends Model
{
    //Uno a muchos 
    //Un profesor puede tener muchas clases
    public function clases(){
        return $this->hasMany(Clase::class);
    }

    //Uno a uno (Inversa)
    //Un profesor puede tener un solo usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Uno a muchos
    //Un profesor puede crear muchas evaluaciones
    public function evaluaciones(){
        return $this->hasMany(Evaluacione::class);
    }

    //Uno a muchos
    //Una profesor puede crear muchas preguntas
    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }

    //Uno a muchos
    //Una profesor puede subir muchos archivos
    public function archivos(){
        return $this->hasMany(Archivo::class);
    }

    //Uno a muchos
    //Una profesor puede crear muchos enlaces
    public function enlaces(){
        return $this->hasMany(Enlace::class);
    }
}
