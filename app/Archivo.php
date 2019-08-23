<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;
use App\Profesore;
use App\Seccione;

class Archivo extends Model
{
    protected $fillable = [
        'id', 'profesore_id', 'categoria_id', 'titulo', 'name', 'public_url', 'size', 'extension'
    ];

    //Uno a muchos (Inversa)
    //Un archivo solo puede pertencer a una categoria
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Muchos a muchos
    //Un archivo puede pertenecer a muchas secciones
    public function secciones(){
        return $this->belongsToMany(Seccione::class)->withPivot('titulo');
    }

    //Uno a muchos (Inversa)
    //Una archivo solo puede pertencer a un profesor
    public function profesore(){
        return $this->belongsTo(Profesore::class);
    }

    //Obtener el tamaño del archivo
    public function getSizeInKbAttribute(){
        return number_format($this->size / 1024, 1);
    }
}
