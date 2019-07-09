<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Clase;
use App\User;

class Review extends Model
{
    protected $fillable = [
        'id', 'clase_id', 'user_id', 'rating', 'comentario'
    ];

    //Uno a muchos (inverso)
    //Una opinión solo puede pertenecer a una clase
    public function clase(){
        return $this->belongsTo(Clase::class);
    }

    //Uno a muchos (inverso)
    //Una opinión solo puede pertenecer a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
