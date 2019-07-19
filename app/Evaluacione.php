<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profesore;
use App\Pregunta;

class Evaluacione extends Model
{
    protected $fillable = [
        'id', 'titulo', 'profesore_id'
    ];

    //Muchos a muchos
    //Una evaluacion puede tener muchas preguntas
    public function preguntas(){
        return $this->belongsToMany(Pregunta::class);
    }

    //Uno a muchos (inverso)
    //Una evaluacion solo puede pertenecer a un profesor
    public function profesore(){
        return $this->belongsTo(Profesore::class);
    }
}
