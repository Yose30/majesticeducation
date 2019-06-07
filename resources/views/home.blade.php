@extends('layouts.app')



<style type="text/css">
 @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    
 html, body {
     font-family: 'Open Sans', sans-serif;
     background-image:url({{ asset('img/aves.png')}});               
     background-repeat: no-repeat;
     background-size: auto auto;
     
    
    }

    a.btn{
       
        font-size: 15px;
        font-family: 'Open Sans', sans-serif;
        padding: 10px;
        background-color:#f2f2f2;
        color:#d91c5c;
        border: 2px solid #ef4c44;    
    }

    a.btn:hover{
        background-color: #ef4c44;
        border: 2px solid #7d4f9d;
        color: #FFFFFF;
    }

    a.btn:active{
        background-color: #7d4f9d;
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

    #btbBuscarM
    {
        background-color:#f2991f;
        color:#000;
        font-weight: bold; 
        border: 1px solid #f2991f;


    }
    #btbBuscarM:hover
    {
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
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="headMM"><center><b>{{ __("Mis materias") }}</b></center></div>
                    <div class="card-body" id="Cuerpo">
                        @include('partials.lista_materias')
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" id="headBM"><center><b>{{ __("Buscar materia") }}</b></center></div>
                    <div class="card-body" id="Cuerpo">
                        @include('partials.buscador_materia')   
                    </div>
                </div>
            </div>
        </div>
        <!-- Comentarios -->
@endsection
