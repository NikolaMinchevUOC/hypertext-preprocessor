@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Schedule </div>

                <div class="card-body">

                    <form method="POST" action="/admin-schedule/update/{{$schedule->id_schedule}}">
                        @csrf

                        <div class="form-group row">
                            <label for="time_start" class="col-md-4 col-form-label text-md-right">Start time</label>

                            <div class="col-md-6">
                                <input id="time_start" type="time" class="form-control" name="time_start" value="{{$schedule->time_start}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time_end" class="col-md-4 col-form-label text-md-right">End time</label>

                            <div class="col-md-6">
                                <input id="time_end" type="time" class="form-control" name="time_end" value="{{$schedule->time_end}}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="day" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <input id="day" type="date" class="form-control" name="day" value="{{$schedule->day}}" required>
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
