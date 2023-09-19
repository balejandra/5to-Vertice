@extends('layouts.app')

@section('titulo')
    Fines de Investigación
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check fa-lg"></i>
                        <strong>Editar Fin de Investigación</strong>
                        <div class="card-header-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        {{ html()->modelForm($finInvestigacion, 'PUT', route('finInvestigaciones.update', [$finInvestigacion->id]))->open() }}
                        @include('taxonomia.fin_investigaciones.fields')
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
