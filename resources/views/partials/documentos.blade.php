@foreach($categorias as $categoria)
    @if($categoria->documentos->count() > 0)
        <div class="tab-pane fade" id="v-pills-{{$categoria->id}}" role="tabpanel"> 
            <table class="table">
                @foreach($documentos->where('categoria_id', $categoria->id) as $documento)
                    <tbody>
                        <tr>
                            <td>{{ $documento->titulo }}</td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-doc"
                                    style="background-color: #7d4f9d; color:white;" 
                                    data-toggle="modal" 
                                    data-target="#viewDoc" 
                                    data-url="{{$documento->url}}"
                                    data-titulo="{{$documento->titulo}}">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </td>
                            <!-- Comprueba si la url_otro existe -->
                            @if($documento->url_otro != null)
                                <td>
                                    <a class="btn" href="https://drive.google.com/uc?export=download&id={{$documento->url_otro}}" style="background-color: #7d4f9d; color:white;">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                            @else
                                <td>
                                    <a class="btn" href="https://drive.google.com/uc?export=download&id={{$documento->url}}" style="background-color: #7d4f9d; color:white;">
                                        <i class="fa fa-download"></i>
                                    </a>
                                </td>
                            @endif
                        </tr>
                    </tbody>
            @endforeach 
            </table>
        </div>
    @endif
@endforeach



