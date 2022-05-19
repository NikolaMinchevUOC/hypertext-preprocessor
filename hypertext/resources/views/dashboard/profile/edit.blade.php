@extends('layouts.dashboard')

@section('title', 'Login')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Perfil </div>
                    <div class="card-body">
                        <form method="POST" action="/profile/{{$user->id}}/update">
                            @csrf
                            {{ method_field('patch') }}
                            
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido:</label>
    
                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono:</label>
    
                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control" name="telephone" value="{{ $user->telephone }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nif" class="col-md-4 col-form-label text-md-right">NIF:</label>
    
                                <div class="col-md-6">
                                    <input id="nif" type="text" class="form-control" name="nif" value="{{ $user->nif }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="" required>
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirma la Contraseña:</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password_confirmation" value="" required>
                                </div>
                            </div>

                            <button type="submit">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection


