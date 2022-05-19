@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Percentage</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-percentage/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Course</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Continuous Assessment</th>
                        <th scope="col">Exams</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($percentages as $percentage)
                    <tr>
                        <td>{{$percentage->id_percentage}}</td>

                        @php
                        $course = \App\Models\Course::where('id_course', $percentage->id_course)->first();
                        $class = \App\Models\Classes::where('id_class', $percentage->id_class)->first();

                        @endphp
                        <td>{{$course->name}}</td>
                        <td>{{$class->name}}</td>

                        <td>{{$percentage->continuous_assessment}}</td>
                        <td>{{$percentage->exams}}</td>
                        <td>
                            <form action="{{ route('examPercentage.destroy',$percentage->id_percentage) }}" method="POST">

                                <a href="/admin-percentage/edit/{{$percentage->id_percentage}}" class="btn btn-info">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
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
