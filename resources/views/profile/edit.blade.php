@extends('layouts.app')
@section('titulo')
    Proyectos
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <i class="fa-regular fa-user"></i>
                            <strong>Información del perfil</strong>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-2"></div>
                                <div class="col-md-7 p-3">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <br>
                        <div class="card shadow">
                            <div class="card-header">
                                <i class="fa-regular fa-user"></i>
                                <strong>Actualizar contraseña</strong>
                            </div>
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-7 p-3">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
