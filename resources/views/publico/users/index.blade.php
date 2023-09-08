@extends('layouts.app')
@section("titulo")
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
                            <strong>Usuarios</strong>
                            @can('crear-usuario')
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm"  href="{{ route('users.create') }}">Nuevo</a>
                                <a class="btn btn-warning btn-sm"  href="{{ route('userDelete.index') }}">Usuarios Eliminados</a>
                            </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('publico.users.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

