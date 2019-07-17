<div class="row">
    @foreach(auth()->user()->profesore->clases as $clase)
        <div class="col-md-3" style="display: flex;">
            <div class="card" style="width: 18rem; margin-bottom: 10px;">
                @if($clase->imagen != NULL)
                    <img src="{{ $clase->pathAttachment() }}" class="card-img-top" alt="{{ $clase->imagen }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $clase->nombre }}</h5>
                </div>
                <ul class="list-group list-group-flush">
                    @if($clase->reviews->count() > 0)
                        <li class="list-group-item">
                        
                        </li>
                    @endif
                    <li class="list-group-item">
                        <a class="btn" id="btnDetalles" href="{{ route('profesor.contenido', ['slug' => $clase->slug]) }}"><i class="fa fa-eye"></i> {{ __("Ver contenido") }}</a>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
</div>