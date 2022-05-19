@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Notification</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-notification/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Student</th>
                        <th scope="col">Work</th>
                        <th scope="col">Exam</th>
                        <th scope="col">Continuous Assessment</th>
                        <th scope="col">Final Note</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($notifications as $notification)
                    <tr>
                        <td>{{$notification->id_notification}}</td>

                        @php
                        $student = \App\Models\User::where('id', $notification->id_student)->first();
                        @endphp
                        <td>{{$student->name}}</td>
                        <td>{{$notification->work}}</td>
                        <td>{{$notification->exam}}</td>
                        <td>{{$notification->continuous_assessment}}</td>
                        <td>{{$notification->final_note}}</td>
                        <td>
                            <form action="{{ route('examNotification.destroy',$notification->id_notification) }}" method="POST">

                                <a href="/admin-notification/edit/{{$notification->id_notification}}" class="btn btn-info">Editar</a>
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
