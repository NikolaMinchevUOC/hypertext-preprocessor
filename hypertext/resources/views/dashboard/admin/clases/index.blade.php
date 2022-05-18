@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Clase</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-courses/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">ID Teacher</th>
                        <th scope="col">ID Course</th>
                        <th scope="col">Day Schedule</th>
                        <th scope="col">Time Start Schedule</th>
                        <th scope="col">Time End Schedule</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clases as $clase)
                    <tr>
                        <td>{{$clase->id_class}}</td>
                        <td>{{$clase->name}}</td>
                        
                        @php
                        $teacher = \App\Models\User::where('id', $clase->id_teacher)->first();
                        $course = \App\Models\Course::where('id_course', $clase->id_course)->first();
                        $schedule = \App\Models\Schedule::where('id_schedule', $clase->id_schedule)->first();
                        @endphp
                    
                        <td>{{$teacher->name}}</td>
                        <td>{{$course->name}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time_start}}</td>
                        <td>{{$schedule->time_end}}</td>
                        <td>{{$clase->color}}</td>
                        <td>
                            <form action="{{ route('clasesController.destroy',$clase->id_class) }}" method="POST">
                              <a href="/admin-clases/edit/{{$clase->id_class}}" class="btn btn-info">Editar</a>
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
