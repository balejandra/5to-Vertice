@extends('layouts.app')

@section('titulo')
    Fin de Investigaciones
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
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($finInvestigacion, [
                                'route' => ['finInvestigaciones.update', $finInvestigacion->id],
                                'method' => 'patch',
                            ]) !!}
                            @include('taxonomia.fin_investigaciones.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

