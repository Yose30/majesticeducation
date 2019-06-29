@extends('layouts.app')

<style type="text/css">
   
    @import url('https://fonts.googleapis.com/css?family=Open+Sans');
   
    html, body {
        background-image:url({{ asset('img/avion.png')}});               
        background-repeat: no-repeat;
        background-position: right top;
        background-size: cover;
        
        font-family: 'Open Sans', sans-serif;
               
    }
    #clavehead{
        background-color:#f7ca39;
        font-size:20px;
        font-weight: bold;    
        border: 1px solid #f2991f;
        
    }
    #contenido{
        border: 1px solid #f2991f;
    }
    #btnacces
    {
        background-color:#f2991f;
        color:#000;
        font-weight: bold;
        border: 1px solid #f2991f;
    }
    #btnacces:hover
    {
        background-color:#f7ca39;
        color:#000;
        font-weight: bold; 
    }
    #clave{
        border: 1px solid #f2991f;

    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" id="claveHead">
                    <p><center>{{ __('Comenzar') }}</center><p>
                    </div>

                <div class="card-body" id="contenido">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            

                            <label for="clave" class="col-md-4 col-form-label text-md-right" >{{ __('Clave') }}</label>

                            <div class="col-md-6">
                                <input id="clave" type="text" class="form-control @error('clave') is-invalid @enderror" name="clave" value="{{ old('clave') }}" required autocomplete="clave" autofocus>

                                @error('clave')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" >
                            <div class="col-md-6 offset-md-4" >
                                <div class="form-check" >
                                    <label>
                                        {{ __('Ingresa la clave para poder consultar los recursos') }}
                                    </label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Mantener la sesión iniciada') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btnacces">
                                    {{ __('Accesar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
