<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subsistema;
use App\Libro;

class Semestre extends Model
{
    //Muchos a muchos
    //Un semestre puede pertenecer a muchos subsistemas
    // public function subsistemas(){
    //     return $this->belongsToMany(Subsistema::class, 'libro_semestre_subsistema');
    // }

    //Muchos a muchos
    //Un semestre puede tener muchos libros
    public function libros(){
        return $this->belongsToMany(Libros::class, 'libro_semestre');
    }
    
}
