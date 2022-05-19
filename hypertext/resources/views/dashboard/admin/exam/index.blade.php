@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Exam</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-exam/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Clase</th>
                        <th scope="col">Student</th>
                        <th scope="col">Mark</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                    <tr>
                        <td>{{$exam->id_exam}}</td>
                        <td>{{$exam->name}}</td>
                        @php
                        $student = \App\Models\User::where('id', $exam->id_student)->first();
                        $class = \App\Models\Classes::where('id_class', $exam->id_class)->first();

                        @endphp
                        <td>{{$class->name}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$exam->mark}}</td>
                        <td>
                            <form action="{{ route('examController.destroy',$exam->id_exam) }}" method="POST">

                                <a href="/admin-exam/edit/{{$exam->id_exam}}" class="btn btn-info">Editar</a>
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
