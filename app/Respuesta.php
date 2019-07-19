<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pregunta;

class Respuesta extends Model
{
    protected $fillable = [
        'id', 'pregunta_id', 'respuesta', 'valor'
    ];

    //Uno a muchos (Inversa)
    //Una respuesta solo puede pertenecer a una pregunta
    public function pregunta(){
        return $this->belongsTo(Pregunta::class);
    }
}
