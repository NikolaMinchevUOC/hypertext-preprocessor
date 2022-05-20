@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Clases</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">



            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Course</th>
                        <th scope="col">Schedule day</th>
                        <th scope="col">Schedule start</th>
                        <th scope="col">Schedule end</th>
                        <th scope="col">% EC</th>
                        <th scope="col">% Exam</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $clase)
                    @php
                    $id_studnet = Illuminate\Support\Facades\Auth::id();
                    $teacher = \App\Models\User::where('id', $clase->id_teacher)->first();
                    $course = \App\Models\Course::where('id_course', $clase->id_course)->first();
                    $schedule = \App\Models\Schedule::where('id_schedule', $clase->id_schedule)->first();
                    $porcentage = \App\Models\Percentage::where('id_course', $course->id_course)->where('id_class', $clase->id_class)->first();
                    @endphp
                    <tr>
                        <td>{{$clase->id_class}}</td>
                        <td>{{$clase->name}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time_start}}</td>
                        <td>{{$schedule->time_end}}</td>
                        <td>{{$porcentage->continuous_assessment}}</td>
                        <td>{{$porcentage->exams}}</td>
                        <td>
                            <div style="padding:10px; background-color:<?php echo $clase->color; ?>"></div>
                        </td>
                        <td>
                            <a href="/profesor-students/{{$course->id_course}}/{{$clase->id_class}}" class="btn btn-info">Alumnos</a>
                            <a href="/profesor-clase-porcentages/{{$course->id_course}}/{{$clase->id_class}}" class="btn btn-info">Modificar Porcentages</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button onclick="history.go(-1);" class="btn btn-info">Back </button>
        </div>
    </div>
</div>


@endsection
