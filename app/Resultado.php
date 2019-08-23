<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evaluacione;
use App\Alumno;

class Resultado extends Model
{
    protected $fillable = [
        'id', 'alumno_id', 'evaluacione_id', 'calificacion'
    ];

    //Uno a muchos (Inversa)
    //Un resultado puede pertenecer a un solo alumno
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }

    //Uno a muchos (Inversa)
    //Un resultado puede pertenecer a una solo evaluación
    public function evaluacione(){
        return $this->belongsTo(Evaluacione::class);
    }
}
