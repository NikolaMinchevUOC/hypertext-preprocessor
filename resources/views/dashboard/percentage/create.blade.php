@extends('adminlte::page')

@section('title', 'Crear Porcentaje')

@section('content_header')
    <h1>Crear Porcentaje</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <form action="/porcentajes" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID Percentage</label>
            <input id="id_percentage" name="id_percentage" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID Course</label>
            <input id="id_course" name="id_course" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID Class</label>
            <input id="id_class" name="id_class" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Continuous Assessment</label>
            <input id="continuous_assessment" name="continuous_assessment" type="text" class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Exams</label>
            <input id="exams" name="exams" type="text" class="form-control" tabindex="5">
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
