@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Works</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">



            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Student</th>
                        <th scope="col">Mensaje</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($mensajes as $mensaje)
                    @php

                    $student = \App\Models\User::where('id', $mensaje->id_student)->first();
                    @endphp
                    <tr>
                        <td>{{$mensaje->id_mensaje}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$mensaje->text}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
