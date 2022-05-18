@extends('layouts.dashboard')

@section('title', 'Login')

@section('navbar')
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{ route('login.destroy') }}">Sign out</a>
      </li>
    </ul>
  </nav>
  
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Cursos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Notificaciones
              </a>
            </li>
          </ul>
        </div>
      </nav>
@endsection

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
