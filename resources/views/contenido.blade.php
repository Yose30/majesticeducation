@extends('layouts.app')
    
<style>
    #scroll-c{
        overflow:auto; 
        height:450px;
    }
    .nav-link {
        
    }
</style>

@section('content')
    <div class="card text-center">
        <div class="card-body">
            {{ $libro->titulo }}
        </div>
    </div>
    <!-- <div class="pos-f-t">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-light p-4">
                @include('partials.lista_materias')
            </div>
        </div>
        <nav class="navbar navbar-light bg-light">
            <button 
                class="navbar-toggler" 
                type="button" 
                data-toggle="collapse" 
                data-target="#navbarToggleExternalContent" 
                aria-controls="navbarToggleExternalContent" 
                aria-expanded="false">
                <span class="navbar-toggler-icon"></span> {{ __("Materias") }}
            </button>
        </nav>
    </div>
    <hr> -->
    <div class="row">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-body" id="scroll-c">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a 
                                class="nav-link" 
                                id="inicio-tab" 
                                data-toggle="pill" 
                                href="#v-inicio" 
                                role="tab">
                                <i class="fa fa-home"> {{ __("Inicio") }}</i>
                            </a>
                            @include('partials.elemento_lista', ['tipo_mat' => $songs, 'titulo_mat' => 'Audios', 'etiqueta' => 'audios', 'clase' => 'volume-up'])
                            @include('partials.elemento_lista', ['tipo_mat' => $videos, 'titulo_mat' => 'Videos', 'etiqueta' => 'videos', 'clase' => 'eye'])
                            @include('partials.elemento_lista', ['tipo_mat' => $links, 'titulo_mat' => 'Links', 'etiqueta' => 'links', 'clase' => 'location-arrow'])
                            @include('partials.elemento_lista', ['tipo_mat' => $documentos, 'titulo_mat' => 'Material', 'etiqueta' => 'material', 'clase' => 'book'])
                       </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-body" id="scroll-c">

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-inicio" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                
                                </div>
                                <div class="col-md-8">
                                    {{ $libro->sinopsis }}
                                    <hr>
                                    @foreach($libro->subsistemas as $subsistema)
                                        {{ $subsistema->subsistema }}
                                    @endforeach
                                    <br>
                                    @foreach($libro->semestres as $semestre)
                                        {{ $semestre->semestre }}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane fade" id="v-audios" role="tabpanel">
                            <songs-component :songs="{{ json_encode($songs) }}"></songs-component>   
                        </div>
                        <div class="tab-pane fade" id="v-videos" role="tabpanel">
                            <videos-component :videos="{{ json_encode($videos) }}"></videos-component>   
                        </div>
                        <div class="tab-pane fade" id="v-links" role="tabpanel">
                              
                        </div>
                        <div class="tab-pane fade" id="v-material" role="tabpanel">
                            @include('partials.documentos')
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
        </div>

@endsection

