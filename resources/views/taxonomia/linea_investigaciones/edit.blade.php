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
                            <strong>Editar Línea de Investigación</strong>
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            {{ html()->modelForm($lineaInvestigacion, 'PUT', route('lineaInvestigaciones.update', [$lineaInvestigacion->id]))->open() }}
                            @include('taxonomia.linea_investigaciones.fields')
                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
