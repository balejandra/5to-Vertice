@extends('layouts.app')
@section('titulo')
    Proyectos
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Consultar Planilla de Proyectos</strong>
                            <div class="card-header-actions">
                                <a href="{{ route('proyectos.index') }} " class="btn btn-primary btn-sm">Listado</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('proyectos.info.show_fields')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
