<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evaluacione;
use App\Resultado;
use App\Archivo;
use App\Enlace;
use App\Clase;

class Seccione extends Model
{
    protected $fillable = [
        'id', 'clase_id', 'evaluacione_id', 'seccion', 'slug'
    ];

    //Uno a muchos (inverso)
    //Una sección solo puede pertenecer a una clase
    public function clase(){
        return $this->belongsTo(Clase::class);
    }

    //Crear el slug cuando la seccion esta siendo creada
    protected static function boot () {
        parent::boot();
        //Mediante el evento creating se creara el slug mientras se este creando la seccion, 
        //siempre y cuando no se este creando desde la consola
        static::saving(function(Seccione $seccion) {
            if( ! \App::runningInConsole() ) {
                $seccion->slug = str_slug($seccion->seccion, "-");
            }
        });
    }

    //Muchos a muchos
    //Una seccion puede tener muchos archivos
    public function archivos(){
        return $this->belongsToMany(Archivo::class)->withPivot('titulo');
    }

    //Muchos a muchos
    //Una seccion puede tener muchos enlaces
    public function enlaces(){
        return $this->belongsToMany(Enlace::class)->withPivot('titulo');
    }

    //Uno a muchos (Inversa)
    //Una seccion puede tener solo una evaluacion
    public function evaluacione(){
        return $this->belongsTo(Evaluacione::class);
    }
}
