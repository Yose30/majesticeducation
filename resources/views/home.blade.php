@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __("Materias") }}</div>
                    <div class="card-body">
                        @foreach(auth()->user()->libros as $libro)
                            <a class="btn btn-outline-success" href="{{ route('contenido', $libro->id) }}">{{ $libro->titulo }}</a></br></br>
                        @endforeach
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
