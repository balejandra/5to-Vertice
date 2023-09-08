@extends('layouts.app')

@section('titulo')
    Fin de Investigaciones
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
                            <strong>Fin de Investigaciones</strong>
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('finInvestigaciones.create') }}">Nuevo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('taxonomia.fin_investigaciones.table')
                            <div class="pull-right mr-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

