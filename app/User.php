<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Review;
use App\Libro;
use App\Clase;
use App\Tipo;

class User extends Authenticatable
{
    use Notifiable;
    
    const ADMIN = 1;
    const PROFESOR = 2;
    const ALUMNO = 3; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clave', 'tipo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Uno a uno
    //Un usuario solo puede tener un tipo
    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    //Muchps a muchos
    //Un usuario puede tener muchos libros
    public function libros(){
        return $this->belongsToMany(Libro::class);
    }

    //Uno a muchos 
    //Un usuario puede tener muchas clases
    public function clases(){
        return $this->hasMany(Clase::class);
    }

    //Uno a muchos
    //Un usuario puede hacer muchas valoraciones
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public static function navigation(){
        return auth()->check() ? auth()->user()->tipo->tipo : 'guest';
    }

}
