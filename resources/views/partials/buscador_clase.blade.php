<form class="form-inline" method="POST" action="{{ route('alumno.unir_clase') }}">
    @csrf
    <input 
        id="codigo" 
        type="text" 
        class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" 
        name="codigo" 
        value="{{ old('codigo') }}" 
        placeholder="Codigo de la clase" 
        required autofocus>
    @if ($errors->has('codigo'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('codigo') }}</strong>
        </span>
    @endif
    <button type="submit" class="btn btn-primary" id="btbBuscarM">{{ __("Unirse") }}</button>
</form>