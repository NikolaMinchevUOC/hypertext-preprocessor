@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Creación de Cursos</div>

                <div class="card-body">

                    <form method="POST" action="/admin-courses/update/{{$curso->id_course}}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del curso</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus value="{{$curso->name}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripción</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required value="{{$curso->description}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_start" class="col-md-4 col-form-label text-md-right">Fecha Comienzo</label>

                            <div class="col-md-6">
                                <input id="date_start" type="date" class="form-control" name="date_start" required value="{{$curso->date_start}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_end" class="col-md-4 col-form-label text-md-right">Fecha de término</label>

                            <div class="col-md-6">
                                <input id="date_end" type="date" class="form-control" name="date_end" required value="{{$curso->date_end}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">¿Activo?</label>

                            <div class="col-md-6">
                                <input class="form-check-input" type="checkbox" checked name="active" id="active">
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