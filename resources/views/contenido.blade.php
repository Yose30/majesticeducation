@extends('layouts.app')
<style>
    
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
    html, body {
     font-family: 'Open Sans', sans-serif;
     background-image:url({{ asset('interfaz/aviondePapek.png')}});               
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
    #misMaterias{
        
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

   
    .nav .nav-link
    {
      
        color:#d91c5c;
        font-style:bold;
        
    }
    .nav .nav-link:hover
    {
        
        color:#7d4f9d;
        font-style:bold;
        
    }
    
    .nav-pills .nav-link.active,
    .show>.nav-pills .nav-link{
        background: #7d4f9d !important
    }
   
    




    
</style>

@section('content')
    <div class="card text-center" id="tituloMateria">
        <div class="card-body">
            
            {{ $libro->titulo }}
            <hr id="hrtitulo">
            <hr id="hrtitulo">
        </div>
    </div>
    <div class="card" >
        <div class="card-body">
            <div class="row">
                <div class="col-md-11">
                    <h5>{{ __("Mis materias") }}</h5>
                </div>
                <div class="col-md-1">
                    <button 
                        type="button" 
                        class="btn btn-outline-success" 
                        data-toggle="modal" 
                        data-target="#buscarMat">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            @include('partials.lista_materias')
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
                                <i class="fa fa-home" > {{ __("Inicio") }}</i>
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
                <div class="card" id="contenido">
                    <div class="card-body" id="scroll-c">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-inicio" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4">
                                        <!-- Imagen del libro -->
                                        <img class="img-fluid" style="width:auto; height:auto;" src="{{ $libro->pathAttachment() }}" />
                                    </div>
                                    <div class="col-md-8">
                                       <hr>
                                        {{ $libro->sinopsis }}
                                        <hr>
                                        <b>
                                        @foreach($libro->subsistemas as $subsistema)
                                            {{ $subsistema->subsistema }}
                                        @endforeach
                                        <br>
                                        @foreach($libro->semestres as $semestre)
                                            {{ $semestre->semestre }}
                                        @endforeach
                                        </b>
                                        <hr>
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
                                <links-component :links="{{ json_encode($links) }}"></links-component>
                            </div>
                            <div class="tab-pane fade" id="v-material" role="tabpanel">
                                @include('partials.documentos')
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        @include('partials.modal_doc')
        @include('partials.modal_buscar')

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