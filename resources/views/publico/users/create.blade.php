@extends('layouts.app')
@section('titulo')
    Usuarios
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user fa-lg"></i>
                            <strong>Crear Usuario</strong>
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 border rounded p-3">
                                    <form method="POST" action="{{ route('users.store') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="email">Email:</label>
                                                <input type="email"
                                                    class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                    name="email" value="{{ old('email') }}" placeholder="Email" required>
                                                @error('email')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">

                                            <!-- Nombres Field -->
                                            <div class="form-group col-sm-6">
                                                <label for="nombres">Nombres:</label>
                                                <input type="text" name="nombres" required placeholder="Nombres"
                                                    class="form-control">
                                            </div>
                                            <!-- Apellidos Field -->
                                            <div class="form-group col-sm-6">
                                                <label for="apellidos">Apellidos:</label>
                                                <input type="text" name="apellidos" required placeholder="Apellidos"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <!-- Email Field -->

                                        <div class="row">
                                            <!-- Password Field -->
                                            <div class="form-group col-sm-6">
                                                <label for="password">Contraseña:</label>
                                                <input type="password" placeholder="Contraseña"
                                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    id="password" name="password" required>
                                                @error('password')
                                                    <span class="error invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="password_confirmation">Confirmar Contraseña:</label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    required placeholder={{ __('Confirm Password') }}>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="rol">Rol asignado:</label>
                                                {{ html()->select()->name('roles')->options($roles)->class('form-control custom-select')->placeholder('Puede asignar un Rol...')->required()->render() }}

                                                <small class="text-muted fw-lighter">Si no encuentra el Rol en el listado,
                                                    asegúrese
                                                    que el mismo tenga un Menú asociado</small>
                                            </div>

                                            <div class="form-group col-sm-6">
                                                <label for="institucion">Institución Asignada:</label>
                                                {{ html()->select()->name('institucion_id')->options($instituciones)->class('form-control custom-select')->placeholder('Puede asignar una Institución...')->required()->render() }}

                                            </div>
                                        </div>
                                        <!-- Submit Field -->


                                        <div class="row form-group mt-4">
                                            <div class="col text-center">
                                                <a href="{{ route('users.index') }} "
                                                    class="btn btn-primary btncancelarZarpes">Cancelar</a>
                                            </div>
                                            <div class=" col text-center">
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </div>

                                        <input type="text" name="tipo_usuario" value="Usuario Interno" hidden>

                                    </form>
                                </div>
                                <div class="col-md-3"></div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
