@extends('adminlte::page')

@section('title', 'Crear Examen')

@section('content_header')
    <h1>Crear Examen</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <form action="/examenes/{{$examen->id_exam}}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID Class</label>
            <input id="id_class" name="id_class" type="text" class="form-control" value="{{$examen->id_class}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID Student</label>
            <input id="id-student" name="id_student" type="text" class="form-control" value="{{$examen->id_student}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{$examen->name}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mark</label>
            <input id="mark" name="mark" type="text" class="form-control" value="{{$examen->mark}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
