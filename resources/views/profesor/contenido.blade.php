@extends('layouts.app')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        html, body {
        font-family: 'Open Sans', sans-serif;
       
        
        }
        #tituloMateria{
            background-color: transparent;
            font-style:bold;
            font-size:24px;
            border-color:transparent;
        }
        #menuMat{
            background-color: transparent;
        }
        #contenido{
            background-color: transparent;
            border-color:transparent;
        }
        #misMaterias{
            background-color: transparent;
        }
        #scroll-c{
            overflow:auto; 
            height:450px;
        }
        #hrtitulo { 
            border-width: 3px;
        }
        #misMat{
            background-color: transparent;
        }
        #misMaterias{
            font-size: 15px;
            font-family: 'Open Sans', sans-serif;
            padding: 10px;
            background-color:#f7ca39;
            color:#000000;
            border: 2px solid #f2991f;    
        }
        #misMaterias:hover{
            background-color: #f2991f;
            border: 2px solid #f7ca39;
            color: #000000;
        }
        #btnNewUnidad{
            background-color: transparent;
            color: #039111;
            font-size: 20px;
        }
        #alert-unidad{
            margin-top: 180;
        }
    </style>

@section('content')
    <div class="card text-center" id="tituloMateria">
        <div class="card-body">
            {{ $clase->nombre }}
            <div align="right">
                <h6><b>{{ __("Codigo de la clase") }}</b>: {{ $clase->codigo }}</h6>
            </div>
            <hr id="hrtitulo">
            <hr id="hrtitulo">
        </div>
    </div>
    <div>
        <contenido-component :secciones="{{ $clase->secciones }}" :clase_id="{{ $clase->id }}"></contenido-component>
    </div>
@endsection
