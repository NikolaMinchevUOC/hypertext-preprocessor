@extends('layouts.app')

@section('title', 'Register')

@section('content')

<form class="form-signin" method="POST">
  @csrf

  <img class="mb-4" src="https://www.uoc.edu/portal/system/modules/edu.uoc.presentations/resources/img/branding/logo-uoc-default.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Registrar Usuario</h1>
  
  <label for="inputName" class="sr-only">Nombre</label>
  <input type="text" class="form-control" placeholder="Nombre" id="name" name="name">

  @error('name')
  <div class="alert alert-danger" role="alert">
     {{ $message }}
  </div>
  @enderror

  <label for="inputEmail" class="sr-only">Correo Electrónico</label>
  <input type="email" class="form-control" placeholder="Correo Electrónico" id="email" name="email">


  @error('email')
  <div class="alert alert-danger" role="alert">
    {{ $message }}
 </div>
  @enderror
  
  <hr>
  
  <label for="inputPassword" class="sr-only">Contraseña</label>
  <input placeholder="Contraseña" id="password" name="password" type="password" class="form-control" required>
  
  @error('password')
  <div class="alert alert-danger" role="alert">
    {{ $message }}
 </div>
  @enderror

  <label for="inputPasswordConfirmation" class="sr-only">Confirmar Contraseña</label>
  <input type="password" class="form-control" placeholder="Confirma la contraseña" id="password_confirmation" name="password_confirmation" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>

  <p class="mt-5 mb-3 text-muted">&copy; UOC</p>
</form>



@endsection
