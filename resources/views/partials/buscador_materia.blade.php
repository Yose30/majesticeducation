<form class="form-inline" method="POST" action="{{ route('home.buscar') }}">
    @csrf
    <input 
        id="clavemat" 
        type="text" 
        class="form-control{{ $errors->has('clavemat') ? ' is-invalid' : '' }}" 
        name="clavemat" 
        value="{{ old('clavemat') }}" 
        placeholder="Clave de la asignatura" 
        required autofocus>
    @if ($errors->has('clavemat'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('clavemat') }}</strong>
        </span>
    @endif
    <button type="submit" class="btn btn-primary" id="btbBuscarM">{{ __("Buscar") }}</button>
</form>