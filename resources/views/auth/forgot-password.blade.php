@extends('layouts/auth')
@section('titulo', 'Contraseña')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <span>
                <img src="{{ asset('images/logo-transporte.png') }}" alt="logo" class="nav-avatar">
            </span>

            <div class="card rounded-4 mx-4 depth-card">
                <div class="card-body p-4">
                    <h3>{{ __('Reset Password') }}</h3>
                    <x-auth-session-status class="alert alert-success" :status="session('status')" />
                    <p class="text-muted">{{ __('Enter Email to reset password') }}</p>
                    <div class="row">
                        <div class="col ">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}" placeholder={{ __('E-Mail Address') }}>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" text-right">
                                    <button type="submit" class=" btn btn-primary px-4">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
