@extends('layouts.app')
<style type="text/css">
    a.btn{
       
        font-size: 15px;
        font-family: sans-serif;   
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
    #hist {
        background-color: #a06a13;
        color: #ffffff;
    }
    #hist:hover {
        background-color: transparent;
        border: 1px solid #a06a13;
        color: #a06a13;

    }
    #cult {
        background-color: #8f6dff;
        color: #ffffff;
    }
    #cult:hover {
        background-color: transparent;
        border: 1px solid #8f6dff;
        color: #8f6dff;

    }
    #geo {
        background-color: #1d75d3;
        color: #ffffff;
    }
    #geo:hover {
        background-color: transparent;
        border: 1px solid #1d75d3;
        color: #1d75d3;

    }
    #varios {
        background-color: #a3e822;
        color: #ffffff;
    }
    #varios:hover {
        background-color: transparent;
        border: 1px solid #a3e822;
        color: #a3e822;
    }
 
  
    
</style>
@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Materias") }}</div>
                    <div class="card-body" id="prueba">
                        @include('partials.lista_materias')
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __("Buscar materia") }}</div>
                    <div class="card-body">
                        @include('partials.buscador_materia')   
                    </div>
                </div>
            </div>
        </div>
        <!-- Comentarios -->
@endsection
