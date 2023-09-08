@extends('layouts/auth')
@section('titulo', 'Registro')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <span>
                <img src="{{ asset('images/logo-transporte.png') }}" alt="logo" class="nav-avatar">
            </span>
            @include('flash::message')
            <div class="card rounded-4 mx-4 depth-card">
                <div class="card-body p-4">

                    <form method="post" action="{{ url('/register') }}" id="form_register">
                        @csrf
                        <h1>{{ __('Register') }}</h1>
                        <br>
                        <div class="form-row">
                            <!--- /////// NUMERO DE IDENTIFICACION /////// -->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                    </div>
                                    <input type="text"
                                        class="form-control {{ $errors->has('numero_identificacion') ? 'is-invalid' : '' }}"
                                        name="numero_identificacion" value="{{ old('numero_identificacion') }}"
                                        placeholder="Número de identificación" id="numero_identificacion" required
                                        onkeydown="return soloNumeros(event)">
                                    @error('numero_identificacion')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!--////////// NOMBRES //////////////-->
                            <div class="col-md-6 col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="nombres" value="{{ old('nombres') }}"
                                        id="nombres" placeholder="Nombres" required>
                                </div>
                            </div>

                            <!--////////// APELLIDOS //////////////-->
                            <div class="col-md-6 col-sm-12" id="apellidosdiv">
                                <div id="apellidosdivint">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos"
                                            value="{{ old('apellidos') }}" id="apellidos" placeholder="Apellidos" required>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 d-none d-md-block"></div>
                            <!--////////// TELEFONO //////////////-->
                            <div class="col-md-6 col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}"
                                        placeholder="Teléfono" required>
                                </div>
                            </div>

                            <div class="w-100 d-none d-md-block"></div>
                            <!--////////// EMAIL //////////////-->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                    @error('email')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--////////// PASSWORD //////////////-->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        name="password" placeholder="Contraseña" required>
                                    @error('password')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!--////////// PASSWORD CONFIRMATION //////////////-->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" required
                                        placeholder={{ __('Confirm Password') }}>
                                </div>
                            </div>

                            <!--////////// BOTON //////////////-->
                            <div class="col-6 text-right">
                                Ya tienes una cuenta?
                                <a href="{{ url('/login') }}" class="link-auth  mt-3">Entra Aqui!</a>
                            </div>
                            <div class="col text-right">
                                <button type="submit" class="btn btn-primary btn-flat px-4"
                                    id="btonregister">{{ __('Register') }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/register-validate.js') }}"></script>
    @endpush
@endsection
