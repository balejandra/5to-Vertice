@extends('layouts.app')

@section('titulo')
    Cadencias Investigativas
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check fa-lg"></i>
                        <strong>Editar Cadencia Investigativa</strong>
                        <div class="card-header-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        {{ html()->modelForm($cadenciaInvestigativa, 'PUT', route('cadenciaInvestigativas.update', [$cadenciaInvestigativa->id]))->open() }}
                        @include('taxonomia.cadencia_investigativas.fields')
                        {{ html()->closeModelForm() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
