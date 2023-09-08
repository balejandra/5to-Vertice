@extends('layouts.app')
@section('titulo')
    Institución
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-building"></i>
                            <strong>Instituciones</strong>
                            @can('crear-institucion')
                                <div class="card-header-actions">
                                    <a class="btn btn-primary btn-sm" href="{{ route('instituciones.create') }}">Nuevo</a>
                                    <a class="btn btn-warning btn-sm"
                                        href="{{ route('institucionDeleted.index') }}">Instituciones
                                        Eliminadas</a>
                                </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            @include('publico.instituciones.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
