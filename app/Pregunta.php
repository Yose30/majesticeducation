<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evaluacione;
use App\Respuesta;
use App\Profesore;

class Pregunta extends Model
{
    protected $fillable = [
        'id', 'profesore_id', 'pregunta', 'respuesta_base'
    ];

    //Muchos a muchos
    //Una pregunta puede pertenecer a muchas evaluaciones
    public function evaluaciones(){
        return $this->belongsToMany(Evaluacione::class);
    }

    //Uno a muchos
    //Una pregunta puede tener muchas respuestas
    public function respuestas(){
        return $this->hasMany(Respuesta::class);
    }

    //Uno a muchos (Inversa)
    //Una pregunta solo puede pertencer a un profesor
    public function profesore(){
        return $this->belongsTo(Profesore::class);
    }
}
