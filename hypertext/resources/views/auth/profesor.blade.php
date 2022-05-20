@extends('layouts.dashboard')

@section('title', 'Home')

@section('h2', 'Profesor')

@section('content')

@php

$id = Illuminate\Support\Facades\Auth::id();
$profesor = \App\Models\User::where('id', $id)->first();

$cursos = DB::table('courses')
->join('classes', 'courses.id_course', '=', 'classes.id_course')
->where('classes.id_teacher',$id)->select('courses.*')->distinct()
->get();
@endphp
<h1>Dashboard de {{$profesor->name}}</h1>
<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h2 class="text-3xl text-center font-bold">Cursos a los que estas apuntado</h2>
        </div>
        <div class="row-span-2 col-span-2 ...">

            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">date_start</th>
                        <th scope="col">date_end</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)

                    <tr>
                        <td>{{$curso->id_course}}</td>
                        <td>{{$curso->name}}</td>
                        <td>{{$curso->description}}</td>
                        <td>{{$curso->date_start}}</td>
                        <td>{{$curso->date_end}}</td>
                        <td>
                            <a href="/profesor-clases/{{$curso->id_course}}" class="btn btn-info">Ver Clases</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection
