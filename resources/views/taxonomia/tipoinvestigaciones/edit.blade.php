@extends('layouts.app')

@section('titulo')
    Tipos de Investigación
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check fa-lg"></i>
                        <strong>Editar Tipo de Investigación</strong>
                        <div class="card-header-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        {{ html()->modelForm($tipoInvestigacion, 'PUT', route('tipoInvestigaciones.update', [$tipoInvestigacion->id]))->open() }}
                        @include('taxonomia.tipoInvestigaciones.fields')
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

