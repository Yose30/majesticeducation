@extends('layouts.app')

@section('content')
    <preguntas-component :preguntas="{{ $preguntas }}"></preguntas-component>
@endsection