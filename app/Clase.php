<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seccione;
use App\Review;
use App\User;

class Clase extends Model
{
    protected $fillable = [
        'id', 'user_id', 'nombre', 'codigo', 'slug', 'imagen'
    ];

    //Uno a muchos (inverso)
    //Una clase solo puede pertenecer a un usuario
    public function user(){
        return $this->belongsTo(User::class);
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
