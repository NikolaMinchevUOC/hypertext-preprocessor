@extends('adminlte::page')

@section('title', 'Crear Notificación')

@section('content_header')
    <h1>Crear Notificación</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <form action="/notificaciones" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID Student</label>
            <input id="id_student" name="id_student" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Work</label>
            <input id="work" name="work" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Exam</label>
            <input id="exam" name="exam" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Continuous Assessment</label>
            <input id="continuous_assessment" name="continuous_assessment" type="text" class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Final Note</label>
            <input id="final_note" name="final_note" type="text" class="form-control" tabindex="5">
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
