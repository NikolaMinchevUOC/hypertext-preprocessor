@extends('adminlte::page')

@section('title', 'Notificaciones')

@section('content_header')
    <h1>Notificaciones</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    <a href="/notificaciones/create" class="btn btn-primary">Crear</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID Notification</th>
                <th scope="col">ID Student</th>
                <th scope="col">Work</th>
                <th scope="col">Exam</th>
                <th scope="col">Continuous Assessment</th>
                <th scope="col">Final Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notificaciones as $notification)
            <tr>
                <td>{{$notification->id_notification}}</td>
                <td>{{$notification->id_student}}</td>
                <td>{{$notification->work}}</td>
                <td>{{$notification->exam}}</td>
                <td>{{$notification->continuous_assessment}}</td>
                <td>{{$notification->final_note}}</td>
                <td>
                    <form action="{{route ('notificaciones.destroy', $notification->id_notification)}}" method="POST">
                        <a href="/notificaciones/{{$notification->id_notification}}/edit" class="btn btn-info">Editar</a>
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
