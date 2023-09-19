@extends('layouts.app')

@section('titulo')
    Líneas de Investigación
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
                            <strong>Líneas de Investigación</strong>
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('lineaInvestigaciones.create') }}">Nuevo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('taxonomia.linea_investigaciones.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
