<div class="modal fade" id="nuevaMateria" tabindex="-1" role="dialog" aria-labelledby="appModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Nueva clase") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('profesor.nueva_clase') }}">
                    @csrf
                    <input 
                        type="text" 
                        class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" 
                        name="nombre" 
                        value="{{ old('nombre') }}" 
                        placeholder="Nombre de la clase" 
                        required autofocus>
                    <br>
                    <div align="right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{ __("Crear") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>