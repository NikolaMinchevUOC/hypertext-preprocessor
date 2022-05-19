@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edición de Enrollments</div>

                <div class="card-body">

                    <form method="POST" action="/admin-clases/update/{{$clases->id_class}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre de la Clase</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$clases->name}}">
                            </div>
                        </div>

                        @php
                        $cursos = \App\Models\Course::all();
                        $profesores = \App\Models\User::where('role', 'profesor')->get();
                        $schedules = \App\Models\Schedule::all();
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
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Selecciona un profesor:</label>
                            <select class="form-control col-md-6" name="profesor" id="profesor">
                                @foreach ($profesores as $profesor)
                                <option value="{{$profesor->id}}">{{$profesor->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="schedule" class="col-md-4 col-form-label text-md-right">Selecciona un Schedule:</label>
                            <select class="form-control col-md-6" name="schedule" id="schedule">
                                @foreach ($schedules as $schedule)
                                <option value="{{$schedule->id_schedule}}">{{$schedule->day}} | {{$schedule->time_start}} - {{$schedule->time_end}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <input type="color" class="form-control form-control-color" name="color" id="color" value="#563d7c" title="Choose your color">
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
