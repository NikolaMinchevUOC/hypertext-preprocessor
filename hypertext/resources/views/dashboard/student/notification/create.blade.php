@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creación de Notification</div>

                <div class="card-body">


                    <form method="POST" action="/admin-notification/create">
                        @csrf

                        @php

                        $students = \App\Models\User::where('role', 'student')->get();
                        @endphp



                        <div class="form-group row">
                            <label for="profesor" class="col-md-4 col-form-label text-md-right">Selecciona un estudiante:</label>
                            <select class="form-control col-md-6" name="student" id="student">
                                @foreach ($students as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Exam</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="exam" type="checkbox" step="any" class="form-check-input" name="exam">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Work</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="work" type="checkbox" step="any" class="form-check-input" name="work">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Continuous assessment </label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="continuous_assessment" type="checkbox" step="any" class="form-check-input" name="continuous_assessment">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Final Note</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="final_note" type="checkbox" step="any" class="form-check-input" name="final_note">
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
