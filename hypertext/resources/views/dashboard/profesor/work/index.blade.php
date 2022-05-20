@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="block mx-auto  p-8 bg-white  border border-gray-200
rounded-lg shadow-lg">


    <div class="grid grid-rows-3 grid-flow-col gap-4">
        <div class="row-span-3 ...">
        </div>
        <div class="col-span-2 ...">
            <h1 class="text-3xl text-center font-bold">Trabajos de {{$student->name}}</h1>
        </div>
        <div class="row-span-2 col-span-2 ...">


            <a href="/profesor-work/create" class="btn btn-primary">CREAR</a>


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
                    @foreach ($works as $work)
                    <tr>
                        <td>{{$work->id_work}}</td>
                        <td>{{$work->name}}</td>
                        @php
                        $student = \App\Models\User::where('id', $work->id_student)->first();
                        $class = \App\Models\Classes::where('id_class', $work->id_class)->first();

                        @endphp
                        <td>{{$class->name}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$work->mark}}</td>
                        <td>
                            <form action="{{ route('profesorWorkController.destroy',$work->id_work) }}" method="POST">

                                <a href="/profesor-work/edit/{{$work->id_work}}" class="btn btn-info">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button onclick="history.go(-1);" class="btn btn-info">Back </button>
        </div>
    </div>
</div>
<script type='text/javascript'>
    (function() {
        if (window.localStorage) {
            if (!localStorage.getItem('firstReLoad')) {
                localStorage['firstReLoad'] = true;
                window.location.reload();
            } else {
                localStorage.removeItem('firstReLoad');
            }
        }
    })();
</script>

@endsection
