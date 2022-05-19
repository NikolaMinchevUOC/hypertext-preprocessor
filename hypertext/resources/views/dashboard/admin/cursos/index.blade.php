@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Admin Courses</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/admin-courses/create" class="btn btn-primary">CREAR</a>


            <table class="table table-dark table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">name</th>
                        <th scope="col">description</th>
                        <th scope="col">date_start</th>
                        <th scope="col">date_end</th>
                        <th scope="col">active</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $curso)
                    <tr>
                        <td>{{$curso->id_course}}</td>
                        <td>{{$curso->name}}</td>
                        <td>{{$curso->description}}</td>
                        <td>{{$curso->date_start}}</td>
                        <td>{{$curso->date_end}}</td>
                        <td>{{$curso->active}}</td>
                        <td>
                            <form action="{{ route('adminController.destroy',$curso->id_course) }}" method="POST">

                                <a href="/admin-courses/edit/{{$curso->id_course}}" class="btn btn-info">Editar</a>
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
