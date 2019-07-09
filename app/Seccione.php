<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clase;
use App\Documento;

class Seccione extends Model
{
    protected $fillable = [
        'id', 'clase_id', 'seccion', 'slug'
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

    //Uno a muchos
    //Una seccion puede tener muchos documentos
    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
