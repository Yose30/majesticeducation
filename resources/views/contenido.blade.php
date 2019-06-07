@extends('layouts.app')
    
<style>
    
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    html, body {
     font-family: 'Open Sans', sans-serif;
     background-image:url({{ asset('img/aviondePapek.png')}});               
     background-repeat: no-repeat;
     background-position: center; /* Center the image */
 
     
    
    }
    #tituloMateria
    {
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
    

    #scroll-c{
        overflow:auto; 
        height:450px;
    }

    /*
    #inicio-tab:hover{
        background-color:#d91c5c;
    }
    #inicio-tab:active{
        background-color:#d91c5c;
    }
    #inicio-tab:visited{
        background-color:#d91c5c;
    }
    #inicio-tab:link{
        background-color:#d91c5c;
    }
    */







    .nav-link {
        
    }
</style>
@section('content')
    <div class="card text-center" id="tituloMateria">
        <div class="card-body">
            {{ $libro->titulo }}
            <hr/>
            <hr/>
        </div>
    </div>
    <div class="row">
            <div class="col-md-4">
                <div class="card" id="menuMat">
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
                            @include('partials.elemento_lista', ['tipo_mat' => $videos, 'titulo_mat' => 'Videos', 'etiqueta' => 'videos', 'clase' => 'video-camera'])
                            @include('partials.elemento_lista', ['tipo_mat' => $links, 'titulo_mat' => 'Links', 'etiqueta' => 'links', 'clase' => 'location-arrow'])
                            @include('partials.elemento_lista', ['tipo_mat' => $documentos, 'titulo_mat' => 'Material', 'etiqueta' => 'material', 'clase' => 'book'])
                            <div 
                                class="nav flex-column" 
                                id="v-pilld-tab-doc" 
                                role="tablist" 
                                aria-orientation="vertical"
                                style="display: none;">
                                @foreach($categorias as $categoria)
                                     @if($categoria->documentos->count() > 0)
                                        <a 
                                            class="nav-link" 
                                            id="v-{{$categoria->id}}-tab" 
                                            data-toggle="pill" 
                                            href="#v-pills-{{$categoria->id}}" 
                                            role="tab" >
                                            {{ $categoria->categoria }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                       </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card"  id="contenido">
                    <div class="card-body" id="scroll-c">
<<<<<<< HEAD

                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-inicio" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                
                                </div>
                                <div class="col-md-8">
                                <hr/>
                                    {{ $libro->sinopsis }}
                                    <hr>
                                    @foreach($libro->subsistemas as $subsistema)
                                        {{ $subsistema->subsistema }}
                                    @endforeach
                                    <br>
                                    @foreach($libro->semestres as $semestre)
                                        {{ $semestre->semestre }}
                                    @endforeach
                                    <hr/>
                                    <a href="{{ route('download', 1) }}">Descargar</a>
=======
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
>>>>>>> origin/master
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

        <div class="modal fade" id="viewDoc" tabindex="-1" role="dialog" aria-labelledby="appModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script>     
    jQuery(document).on("click", '.btn-doc', function (e) {
        e.preventDefault();
        let modal = jQuery("#viewDoc");
        const url = jQuery(this).data('url');
        const titulo = jQuery(this).data('titulo');
        modal.find('.modal-title').text(titulo);
        let $contenido = $("<div></div>");
        $contenido.append(`<object data="${url}" type="application/pdf" width="100%" height="80%"></object>`);
        modal.find('.modal-body').html($contenido);
        modal.modal();
        console.log(modal);
    });

    jQuery(document).on("click", '#inicio-tab', function (e) {
        $('#v-pilld-tab-doc').hide();
    });
    jQuery(document).on("click", '#audios-tab', function (e) {
        $('#v-pilld-tab-doc').hide();
    });
    jQuery(document).on("click", '#videos-tab', function (e) {
        $('#v-pilld-tab-doc').hide();
    });

    jQuery(document).on("click", '#links-tab', function (e) {
        $('#v-pilld-tab-doc').hide();
    });

    jQuery(document).on("click", '#material-tab', function (e) {
        $('#v-pilld-tab-doc').show();
    });
</script>


