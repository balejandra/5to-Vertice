@extends('layouts/auth')
@section('titulo', 'Resetear')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <span>
                <img src="{{ asset('images/logo-transporte.png') }}" alt="logo" class="nav-avatar">
            </span>

            <div class="card rounded-4 mx-4 depth-card">
                <div class="card-body p-4">
                    <h3>{{ __('Reset Password') }}</h3>
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <!-- Email Address -->
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-at"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                name="email" value="{{ old('email', $request->input('email')) }}" placeholder={{ __('E-Mail Address') }}
                                required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- Password -->
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                placeholder={{ __('Password') }} name="password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Confirm Password -->
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" required
                                placeholder={{ __('Confirm Password') }}>
                        </div>


                        <div class="col text-right">
                            <button class=" btn btn-primary px-4" type="submit">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
