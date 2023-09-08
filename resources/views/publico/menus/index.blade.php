@extends('layouts.app')
@section('titulo')
    Menús
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            <strong>{{ $titulo }}</strong>
                            <div class="card-header-actions">
                                @can('crear-menu')
                                    <a class="btn btn-primary btn-sm" href="{{ route('menus.create') }}">Nuevo</a>
                                @endcan
                                <a class="btn btn-primary btn-sm" href="{{ route('menuRols.index') }}">Listado de Roles y
                                    Menús</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('menuDelete.index') }}">Menús
                                    Eliminados</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('publico.menus.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
