@extends('layouts.app')
    
@section('content')
    <div class="card">
        <div class="card-header" id="headMM"><center><b>{{ __("Mis clases") }}</b></center></div>
        <div class="card-body" id="Cuerpo">
            @include('partials.clase.alumno_card_clases')
            @if(auth()->user()->alumno->clases->count() == 0)
                <div class="alert alert-secondary" align="center" role="alert">
                    <i class="fa fa-info"></i> {{ __("No te has unido a clases") }}
                </div>
            @endif
        </div>
    </div>

    @include('partials.modal_unir')
@endsection