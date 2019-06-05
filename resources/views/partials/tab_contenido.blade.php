<div class="tab-pane fade" id="v-{{$etiqueta}}" role="tabpanel">
    <documentos-component :documentos="{{ json_encode($documentos) }}" :clasif="'{{$nombre}}'"></documentos-component>
</div>