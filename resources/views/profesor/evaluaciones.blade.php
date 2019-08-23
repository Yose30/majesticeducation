@extends('layouts.app')

@section('content')
    <evaluacion-component :preguntas="{{ $preguntas }}"></evaluacion-component>
@endsection