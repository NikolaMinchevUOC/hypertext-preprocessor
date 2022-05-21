@extends('layouts.dashboard')

@section('title', 'Edit Course')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modificar Notification</div>

                <div class="card-body">

                    <form method="POST" action="/student-notification/update/">

                        @csrf

                        @php
                        //$students = \App\Models\User::where('role', 'student')->get();
                        $student = Illuminate\Support\Facades\Auth::user();
                        // {"id":3,"name":"Israel","surname":"P\u00e9rez P\u00e9rez","telephone":"+3465600236","nif":"12454441D","email":"israel@gmail.com","email_verified_at":null,"role":"student","created_at":"2022-05-20T16:20:22.000000Z","updated_at":"2022-05-20T16:20:22.000000Z"}

                        @endphp



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Exam</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="exam" type="checkbox" step="any" class="form-check-input" name="exam" @php if ($notification->exam == 1){echo 'checked';}@endphp>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Work</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="work" type="checkbox" step="any" class="form-check-input" name="work" @php if ($notification->work == 1){echo 'checked';}@endphp>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Continuous assessment </label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="continuous_assessment" type="checkbox" step="any" class="form-check-input" name="continuous_assessment" @php if ($notification->continuous_assessment == 1){echo 'checked';}@endphp>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Final Note</label>

                            <div class="col-md-4 col-form-label text-md-left">
                                <input id="final_note" type="checkbox" step="any" class="form-check-input" name="final_note" @php if ($notification->final_note == 1){echo 'checked';}@endphp>
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
