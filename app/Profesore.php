<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Clase;

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
}
