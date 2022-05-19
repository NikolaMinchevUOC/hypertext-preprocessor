@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creación de Enrollments</div>

                <div class="card-body">

                    <form method="POST" action="/admin-enrolment/create">
                        @csrf


                        @php
                        $cursos = \App\Models\Course::all();
                        $students = \App\Models\User::where('role', 'student')->get();
                        @endphp


                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Selecciona un curso:</label>
                            <select class="form-control col-md-6" name="course" id="course">

                                @foreach ($cursos as $curso)
                                <option value="{{$curso->id_course}}">{{$curso->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Selecciona un estudiante:</label>
                            <select class="form-control col-md-6" name="student" id="student">
                                @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
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
