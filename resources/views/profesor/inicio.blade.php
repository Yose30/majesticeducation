@extends('layouts.app')
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');
        html, body {
            font-family: 'Open Sans', sans-serif;             
            background-repeat: no-repeat;
            background-size: auto auto;
        }
        a.btn{
            font-size: 15px;
            font-family: 'Open Sans', sans-serif;
            padding: 10px;
            background-color:#f7ca39;
            color:#000000;
            border: 2px solid #f2991f;   
        }
        a.btn:hover{
            background-color: #f2991f;
            border: 2px solid #f7ca39;
            color: #000000;
        }
        a.btn:active{
            background-color: #d91c5c;
            border: 2px solid #7d4f9d;
            color: #FFFFFF;
        }
        a.btn i{
            font-size: 50px;
        }
        #headMM{
            font-size:20px;
            font-weight: bold; 
            background-color:#f7ca39;
            border: 1px solid #f2991f;
        }
        #headBM{
            font-size:20px;
            font-weight: bold; 
            background-color:#f7ca39;
            border: 1px solid #f2991f;
        }
        #btbBuscarM{
            background-color:#f2991f;
            color:#000;
            font-weight: bold; 
            border: 1px solid #f2991f;
        }
        #btbBuscarM:hover{
            background-color:#f7ca39;
            color:#000;
            font-weight: bold; 
        }
        #cuerpo{
            border: 1px solid #f2991f;
        }
        #clavemat{
            border: 1px solid #f2991f;
        }
    </style>
@section('content')
    <div class="card">
        <div class="card-header" id="headMM"><center><b>{{ __("Mis clases") }}</b></center></div>
        <div class="card-body" id="Cuerpo">
            @include('partials.clase.card_clases')
            @if(auth()->user()->clases->count() == 0)
                <div class="alert alert-secondary" align="center" role="alert">
                    <i class="fa fa-info"></i> {{ __("No tienes clases creadas") }}
                </div>
            @endif
        </div>
    </div>
@endsection