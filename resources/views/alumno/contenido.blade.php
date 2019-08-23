@extends('layouts.app')

@section('content')
    <div class="card text-center" id="tituloMateria">
        <div class="card-body">
            {{ $clase->nombre }}
            <div class="row">
                <h6 class="col-md-6" align="left"><b>{{ __("Profesor") }}</b>: {{ $clase->profesore->user->name }}</h6>
                <h6 class="col-md-6" align="right"><b>{{ __("Codigo de la clase") }}</b>: {{ $clase->codigo }}</h6>
            </div>
            <hr id="hrtitulo">
        </div>
    </div>
    <div>
        <contenidoa-component :secciones="{{$clase->secciones}}"></contenidoa-component>
    </div>
@endsection