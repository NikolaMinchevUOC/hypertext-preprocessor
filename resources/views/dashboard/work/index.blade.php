@extends('adminlte::page')

@section('title', 'Trabajos')

@section('content_header')
    <h1>Exam</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <a href="/trabajos/create" class="btn btn-primary">Crear</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID Work</th>
                <th scope="col">ID Class</th>
                <th scope="col">ID Student</th>
                <th scope="col">Name</th>
                <th scope="col">Mark</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trabajos as $work)
            <tr>
                <td>{{$work->id_work}}</td>
                <td>{{$work->id_class}}</td>
                <td>{{$work->id_student}}</td>
                <td>{{$work->name}}</td>
                <td>{{$work->mark}}</td>
                <td>
                    <form action="{{route ('trabajos.destroy', $work->id_work)}}" method="POST">
                        <a href="/trabajos/{{$work->id_work}}/edit" class="btn btn-info">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
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
