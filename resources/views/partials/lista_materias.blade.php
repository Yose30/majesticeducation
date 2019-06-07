@foreach(auth()->user()->libros as $libro)
    <a class="btn btn-outline-success" style="margin-top:5px;" href="{{ route('contenido', $libro->id) }}" id="misMaterias">{{ $libro->titulo }}</a>
@endforeach