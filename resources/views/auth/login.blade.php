@extends('layouts/auth')
@section('titulo', 'Login')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card-group rounded-4 shadow">
                <div class="card rounded-start-4 py-5 bg-primary text-white">
                    <div class="card-body text-center">
                        <div>
                            <span>
                                <img src="{{ asset('images/logo-transporte.png') }}" alt="logo" class="nav-avatar">
                            </span>
                            <div class="text-center">
                                <h3>Sistema de Gestión de Proyectos 5to Vertice</h3>
                            </div>
                            <br>
                            <p>No tienes cuenta, regístrate aquí.</p>
                            <a class="btn btn-outline-secondary mt-3" href="{{ url('/register') }}">{{ __('Register') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card depth-card rounded-end-4 col-md-5   p-4">


                    <div class="card-body  ">
                        <form method="post" action="{{ url('/login') }}">
                            @csrf
                            <h1>Bienvenido</h1>
                            <p class="text-muted">{{ __('Sign In to your account') }}</p>
                            <br>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" placeholder={{ __('E-Mail Address') }}>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </span>
                                </div>
                                <input type="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    placeholder={{ __('Password') }} name="password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-6 ">
                                    <a class="link-auth" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary px-4" type="submit">Acceder</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
