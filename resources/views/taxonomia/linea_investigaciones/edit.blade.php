@extends('layouts.app')

@section('titulo')
    Línea de Investigaciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class card>
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Editar Línea de Investigación</strong>
                            <div class="card-header-actions">
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($lineaInvestigacion, [
                                'route' => ['lineaInvestigaciones.update', $lineaInvestigacion->id],
                                'method' => 'patch',
                            ]) !!}
                            @include('taxonomia.linea_investigaciones.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
