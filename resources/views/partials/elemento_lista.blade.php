@if($tipo_mat->count() != 0)
    <a 
        class="nav-link" 
        id="{{$etiqueta}}-tab" 
        data-toggle="pill" 
        href="#v-{{$etiqueta}}" 
        role="tab">
        <i class="fa fa-{{$clase}}" ></i> {{ $titulo_mat }}
    </a>
@endif