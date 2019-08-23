<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Profesore;
use App\Seccione;

class Enlace extends Model
{
    protected $fillable = [
        'id', 'profesore_id', 'categoria_id', 'titulo', 'url'
    ];

    //Uno a muchos (Inversa)
    //Un enlace solo puede pertencer a una categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Muchos a muchos
    //Un archivo puede pertenecer a muchas secciones
    public function secciones(){
        return $this->belongsToMany(Seccione::class)->withPivot('titulo');
    }

    //Uno a muchos (Inversa)
    //Un enlace solo puede pertencer a un profesor
    public function profesore(){
        return $this->belongsTo(Profesore::class);
    }
}
