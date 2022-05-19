@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creación de Cursos</div>

                <div class="card-body">


                    <form method="POST" action="/admin-work/create">

                        @csrf

                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del trabajo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        @php
                        $classes = \App\Models\Classes::all();
                        $students = \App\Models\User::where('role', 'student')->get();
                        @endphp


                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Selecciona la clase:</label>
                            <select class="form-control col-md-6" name="clase" id="clase">

                                @foreach ($classes as $clase)
                                <option value="{{$clase->id_class}}">{{$clase->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Selecciona el estudiante:</label>
                            <select class="form-control col-md-6" name="student" id="student">

                                @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nota</label>

                            <div class="col-md-6">
                                <input id="mark" type="number" step="any" class="form-control" name="mark" required autofocus>
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" name="crearGuardar" value="cursos" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
