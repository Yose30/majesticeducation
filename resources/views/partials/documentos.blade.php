<div class="row">
    <div class="col-md-4">
        <div id="list-example" class="list-group">
            @foreach($categorias as $categoria)
                @if($categoria->documentos->count() > 0)
                    <a 
                        class="list-group-item list-group-item-action" 
                        href="#list-item-{{$categoria->id}}">
                        {{ $categoria->categoria }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    <div class="col-md-8">
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
            @foreach($categorias as $categoria)
                @if($categoria->documentos->count() > 0)
                    <h6 id="list-item-{{$categoria->id}}">{{$categoria->categoria}}</h6>
                    <table class="table">
                        @foreach($documentos->where('categoria_id', $categoria->id) as $documento)
                       
                            <tbody>
                                <tr>
                                    <td>{{ $documento->titulo }}</td>
                                    <td>
                                        <a class="btn" style="background-color: '#7d4f9d'">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn" style="background-color: '#7d4f9d">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        
                    @endforeach 
                    </table>
                @endif
            @endforeach
        </div>
    </div>
</div>

