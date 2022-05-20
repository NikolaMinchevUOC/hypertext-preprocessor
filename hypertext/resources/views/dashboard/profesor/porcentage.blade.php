@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Percentage</div>

                <div class="card-body">

                    <form method="POST" action="/profesor-percentage/update/{{$percentage->id_percentage}}">


                        @csrf






                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Selecciona el curos:</label>
                            <select class="form-control col-md-6" name="curso" id="curso">


                                <option value="{{$curso->id_course}}">{{$curso->name}}</option>

                            </select>
                        </div>



                        <div class="form-group row">
                            <label for="course" class="col-md-4 col-form-label text-md-right">Selecciona la clase:</label>
                            <select class="form-control col-md-6" name="clase" id="clase">


                                <option value="{{$clase->id_class}}">{{$clase->name}}</option>

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Continuous assessment </label>

                            <div class="col-md-6">
                                <input id="continuous_assessment" type="number" step="any" class="form-control" name="continuous_assessment" value="{{$percentage->continuous_assessment}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Exams</label>

                            <div class="col-md-6">
                                <input id="exams" type="number" step="any" class="form-control" name="exams" value="{{$percentage->exams}}" required autofocus>
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
