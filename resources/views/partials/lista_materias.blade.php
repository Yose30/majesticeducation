@foreach(auth()->user()->libros as $libro)
    <a class="btn btn-outline-success" href="{{ route('contenido', $libro->id) }}">{{ $libro->titulo }}</a></br></br>
@endforeach