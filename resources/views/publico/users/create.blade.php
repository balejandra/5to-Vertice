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


                                    {!! Form::open(['route' => 'users.store']) !!}
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            {!! Form::label('email', 'Email:') !!}
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
                                            {!! Form::label('nombres', 'Nombres:') !!}
                                            {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'placeholder' => 'Nombres']) !!}
                                        </div>
                                        <!-- Apellidos Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('apellidos', 'Apellidos:') !!}
                                            {!! Form::text('apellidos', null, ['class' => 'form-control', 'required', 'placeholder' => 'Apellidos']) !!}
                                        </div>
                                    </div>
                                    <!-- Email Field -->

                                    <div class="row">
                                        <!-- Password Field -->
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('password', 'Contraseña:') !!}
                                            <input type="password" placeholder="Contraseña"
                                                class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                id="password" name="password" required>
                                            @error('password')
                                                <span class="error invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">

                                            {!! Form::label('password', 'Confirmar Contraseña:') !!}
                                            <input type="password" name="password_confirmation" class="form-control"
                                                required placeholder={{ __('Confirm Password') }}>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            {!! Form::label('role id', 'Rol asignado:') !!}

                                            {!! Form::select('roles', $roles, null, [
                                                'class' => 'form-control custom-select',
                                                'placeholder' => 'Puede asignar un Rol...',
                                                'required',
                                                'title' => 'Si no encuentra el Rol en el listado, asegúrese que el mismo tenga un Menú asociado ',
                                            ]) !!}
                                            <small class="text-muted fw-lighter">Si no encuentra el Rol en el listado,
                                                asegúrese
                                                que el mismo tenga un Menú asociado</small>
                                        </div>

                                        <div class="form-group col-sm-6">
                                            {!! Form::label('role id', 'Institución Asignada:') !!}

                                            {!! Form::select('institucion_id', $instituciones, null, [
                                                'class' => 'form-control custom-select',
                                                'placeholder' => 'Puede asignar una Institución...',
                                                'required',
                                            ]) !!}

                                        </div>
                                    </div>
                                    <!-- Submit Field -->


                                    <div class="row form-group mt-4">
                                        <div class="col text-center">
                                            <a href="{{ route('users.index') }} "
                                                class="btn btn-primary btncancelarZarpes">Cancelar</a>
                                        </div>
                                        <div class=" col text-center">
                                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>

                                    <input type="text" name="tipo_usuario" value="Usuario Interno" hidden>

                                    {!! Form::close() !!}


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
