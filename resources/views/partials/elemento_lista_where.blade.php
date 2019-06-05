@if($documentos->where('clasificacion', $clasif)->count() != 0)
    <a 
        class="nav-link" 
        id="{{$etiqueta}}-tab" 
        data-toggle="pill" 
        href="#v-{{$etiqueta}}" 
        role="tab">
        {{ $clasif }}
    </a>
@endif