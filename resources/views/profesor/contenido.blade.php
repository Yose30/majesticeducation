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
        .nav .nav-link{
            color:#d91c5c;
            font-style:bold;
        }
        .nav .nav-link:hover{
            color:#7d4f9d;
            font-style:bold;
        }
        .nav-pills .nav-link.active,
        .show>.nav-pills .nav-link{
            background: #7d4f9d !important
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
        <menu-component :secciones="{{$clase->secciones}}" :clase_id="{{$clase->id}}"></menu-component>
    </div>
    <!-- <div class="row">
        <div class="col-md-4">
            <div class="card" id="menuMat">
                <div class="card-body" id="scroll-c">
                    <div align="right">
                        @include('partials.clase.btn_nueva_unidad')
                    </div>
                    <hr> -->
                    <!-- <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" 
                            data-toggle="pill" 
                            href="#v-home" 
                            role="tab">
                            <i class="fa fa-home"></i> Inicio
                        </a>
                        @foreach($clase->secciones as $seccion)
                            <a class="nav-link" 
                                data-toggle="pill" 
                                href="#v-{{$seccion->slug}}" 
                                role="tab">
                                <i class="fa fa-book"></i> {{ $seccion->seccion }}
                            </a>
                        @endforeach
                    </div> -->
                <!-- </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card" id="contenido">
                <div class="card-body" id="scroll-c">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-home" role="tabpanel">
                            
                        </div>
                        @forelse($clase->secciones as $seccion)
                            <div class="tab-pane fade" id="v-{{$seccion->slug}}" role="tabpanel">
                                
                            </div>
                        @empty
                            <div class="alert alert-secondary" role="alert" align="center" id="alert-unidad">
                                {{ __("Crear unidades ") }} @include('partials.clase.btn_nueva_unidad')
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <recursos-component></recursos-component> -->
    @include('partials.clase.modal_nueva_unidad')
@endsection
