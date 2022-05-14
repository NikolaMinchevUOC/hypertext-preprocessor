@extends('adminlte::page')

@section('title', 'Crear Examen')

@section('content_header')
    <h1>Crear Trabajo</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <form action="/trabajos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID Class</label>
            <input id="id_class" name="id_class" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID Student</label>
            <input id="id_student" name="id_student" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Mark</label>
            <input id="mark" name="mark" type="text" class="form-control" tabindex="4">
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
