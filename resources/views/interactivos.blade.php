@extends('layouts.general')
<style>
    #btnacces{
        background-color:#f2991f;
        color:#ffffff;
        font-weight: bold;
        border: 1px solid #f2991f;
    }
    #ptexto {
        font-size: 20px;
        font-weight: 600;
        font-style: bold;
        color: #9E1F63;
    }
</style>
@section('content')
    <div class="title m-b-md">
        Demo Interactivo
    </div>
    <br>
    <p id="ptexto">Este sitio de demostración le brinda la oportunidad de <br>explorar contenido interactivo en Majestic Education.</p>
    <p id="ptexto">Vea una variedad de actividades interactivas.</p>
    <a class="btn btn-primary" href="https://www.3d-estudio.com.mx/projects/final/pass.html" id="btnacces">Demo</a>
    

@endsection