@extends('adminlte::page')

@section('title', 'Porcentaje')

@section('content_header')
    <h1>Porcentaje</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <a href="/porcentajes/create" class="btn btn-primary">Crear</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID Percentage</th>
                <th scope="col">ID Course</th>
                <th scope="col">ID Class</th>
                <th scope="col">Continuous Assessment</th>
                <th scope="col">Exams</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($porcentajes as $percentage)
            <tr>
                <td>{{$percentage->id_percentage}}</td>
                <td>{{$percentage->id_course}}</td>
                <td>{{$percentage->id_class}}</td>
                <td>{{$percentage->continuous_assessment}}</td>
                <td>{{$percentage->exams}}</td>
                <td>
                    <form action="{{route ('porcentajes.destroy', $percentage->id_percentage)}}" method="POST">
                        <a href="/porcentajes/{{$percentage->id_percentage}}/edit" class="btn btn-info">Editar</a>
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
