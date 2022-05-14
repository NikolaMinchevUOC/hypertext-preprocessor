@extends('adminlte::page')

@section('title', 'Exam')

@section('content_header')
    <h1>Exam</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <a href="/examenes/create" class="btn btn-primary">Crear</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID Exam</th>
                <th scope="col">ID Class</th>
                <th scope="col">ID Student</th>
                <th scope="col">Name</th>
                <th scope="col">Mark</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($examenes as $exam)
            <tr>
                <td>{{$exam->id_exam}}</td>
                <td>{{$exam->id_class}}</td>
                <td>{{$exam->id_student}}</td>
                <td>{{$exam->name}}</td>
                <td>{{$exam->mark}}</td>
                <td>
                    <a href="/examenes/{{$exam->id_exam}}/edit" class="btn btn-info">Editar</a>
                    <a href="" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
