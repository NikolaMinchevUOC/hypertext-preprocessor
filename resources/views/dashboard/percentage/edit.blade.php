@extends('adminlte::page')

@section('title', 'Ediar Porcentaje')

@section('content_header')
    <h1>Editar Porcentaje</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <form action="/porcentajes/{{$porcentaje->id_percentage}}" method="POST">
        @csrf
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID Course</label>
            <input id="id_course" name="id_course" type="text" class="form-control" value="{{$porcentaje->id_course}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">ID Class</label>
            <input id="id_class" name="id_class" type="text" class="form-control" value="{{$porcentaje->id_class}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Continuous Assessment</label>
            <input id="continuous_assessment" name="continuous_assessment" type="text" class="form-control" value="{{$porcentaje->continuous_assessment}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Exams</label>
            <input id="exams" name="exams" type="text" class="form-control" value="{{$porcentaje->exams}}">
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
