<div class="modal fade" id="nuevaUnidad" tabindex="-1" role="dialog" aria-labelledby="appModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Nueva unidad") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('profesor.nueva_unidad') }}">
                    @csrf
                    <input 
                        type="text" 
                        class="form-control{{ $errors->has('seccion') ? ' is-invalid' : '' }}" 
                        name="seccion" 
                        value="{{ old('seccion') }}" 
                        placeholder="Nombre de la unidad" 
                        required autofocus>
                    <input type="hidden" name="clase_id" value="{{ $clase->id }}">
                    <br>
                    <div align="right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> {{ __("Crear") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>