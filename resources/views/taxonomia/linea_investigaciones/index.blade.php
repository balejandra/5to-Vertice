@extends('layouts.app')

@section('titulo')
    Línea de Investigaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Línea de Investigaciones</strong>
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('lineaInvestigaciones.create') }}">Nuevo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('taxonomia.linea_investigaciones.table')
                            <div class="pull-right mr-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
