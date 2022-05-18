@extends('layouts.app')

@section('title', 'Login')

@section('content')

<form class="form-signin" method="POST">
    @csrf
    
    <img class="mb-4" src="https://www.uoc.edu/portal/system/modules/edu.uoc.presentations/resources/img/branding/logo-uoc-default.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
    
    <label for="inputEmail" class="sr-only">Correo Electrónico</label>
    <input placeholder="Correo Electrónico" id="email" name="email" type="email" class="form-control" required autofocus>
    
    <label for="inputPassword" class="sr-only">Contraseña</label>
    <input placeholder="Contraseña" id="password" name="password" type="password" class="form-control" required>
    
    @error('message')
    <div class="alert alert-danger" role="alert">
       {{ $message }}
    </div>
    @enderror

    <button class="btn btn-lg btn-primary btn-block" type="submit">Inciar sesión</button>
    <p class="mt-5 mb-3 text-muted">&copy; UOC</p>
  </form>



@endsection
