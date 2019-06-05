<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Documento;

class Categoria extends Model
{
    //Uno a muchos
    //Una categoria puede tener muchos documentos
    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
