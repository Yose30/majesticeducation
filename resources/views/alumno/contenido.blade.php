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

    <!-- <audio controls src="https://dl.dropbox.com/s/loh0y804dk8a7mg/VID-20190626-WA0002.mp4"></audio>
    <embed src="https://dl.dropbox.com/s/vldfd9nvfnftyk1/archivo-pdf.pdf" type="application/pdf" width="100%" height="600px" />
    <iframe 
        width="100%" 
        height="75%" 
        src="https://dl.dropbox.com/s/loh0y804dk8a7mg/VID-20190626-WA0002.mp4" 
        frameborder="0" 
        allowfullscreen>
    </iframe> -->
    <div>
        <contenidoa-component :secciones="{{$secciones}}"></contenidoa-component>
    </div>
@endsection