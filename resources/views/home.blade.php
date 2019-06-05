@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Materias") }}</div>
                    <div class="card-body">
                        @include('partials.lista_materias')
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __("Buscar materia") }}</div>
                    <div class="card-body">
                        @include('partials.buscador_materia')   
                    </div>
                </div>
            </div>
        </div>
        <!-- Comentarios -->
@endsection
