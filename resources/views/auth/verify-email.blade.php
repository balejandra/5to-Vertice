@extends('layouts/auth')
@section('titulo', 'Verificación')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span>
                <img src="{{ asset('images/logo-transporte.png') }}" alt="logo" class="nav-avatar">
            </span>
            @include('flash::message')
            <div class="card rounded-4 mx-4 depth-card">
                <div class="card-body p-4">
                    <p> {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didnt receive the email, we will gladly send you another.') }}
                    </p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                </div>
                @endif
                <br>
                <div class="row">
                    <div class="col-6 ">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button class="btn btn-primary btn-flat px-4">
                                {{ __('Resend Verification Email') }}
                            </button>
                        </form>
                    </div>
                    <div class="col-6 text-right">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary ">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
