@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Enrollments</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/student-enrolment/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Student</th>
                        <th scope="col">Course</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{$enrollment->id_enrollment}}</td>

                        @php
                        $student = \App\Models\User::where('id', $enrollment->id_student)->first();
                        $course = \App\Models\Course::where('id_course', $enrollment->id_course)->first();

                        @endphp

                        <td>{{$student->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$enrollment->status}}</td>
                        <td>
                            <form action="" method="POST">
                                <a href="/student-enrolment/edit/{{$enrollment->id_enrollment}}" class="btn btn-info">Change Status</a>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
