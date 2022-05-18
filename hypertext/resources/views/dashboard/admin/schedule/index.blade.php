@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Schedules</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-schedule/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">time start</th>
                        <th scope="col">time end</th>
                        <th scope="col">date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{$schedule->id_schedule}}</td>
                        <td>{{$schedule->time_start}}</td>
                        <td>{{$schedule->time_end}}</td>
                        <td>{{$schedule->day}}</td>
                        <td>
                            <form action="{{ route('scheduleController.destroy',$schedule->id_schedule) }}" method="POST">

                                <a href="/admin-schedule/edit/{{$schedule->id_schedule}}" class="btn btn-info">Editar</a>
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
