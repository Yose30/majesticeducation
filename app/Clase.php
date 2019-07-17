<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seccione;
use App\Profesore;
use App\Alumno;
use App\Review;

class Clase extends Model
{
    protected $fillable = [
        'id', 'profesore_id', 'nombre', 'codigo', 'slug', 'imagen'
    ];

    //Uno a muchos (inverso)
    //Una clase solo puede pertenecer a un profesor
    public function profesore(){
        return $this->belongsTo(Profesore::class);
    }

    //Muchos a muchos
    //Una clase puede tener muchos alumnos
    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }

    //Uno a muchos
    //Una clase puede tener muchas valoraciones
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    //Uno a muchos
    //Una clase puede tener muchas secciones
    public function secciones(){
        return $this->hasMany(Seccione::class);
    }

    //Crear el slug cuando la clase esta siendo creada
    protected static function boot () {
        parent::boot();
        //Mediante el evento creating se creara el slug mientras se este creando la clase, 
        //siempre y cuando no se este creando desde la consola
        static::saving(function(Clase $clase) {
            if( ! \App::runningInConsole() ) {
                $clase->slug = str_slug($clase->nombre, "-");
            }
        });
    }

    public function pathAttachment(){
        return url("/images/clases/".$this->imagen);
    }

}
