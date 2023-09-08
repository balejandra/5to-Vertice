@extends('layouts.app')

@section('titulo')
    Tipo de Actividades
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Editar Tipo de Actividad</strong>
                            <div class="card-header-actions">
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($tipoActividad, [
                                'route' => ['tipoActividades.update', $tipoActividad->id],
                                'method' => 'patch',
                            ]) !!}
                            @include('taxonomia.tipo_actividades.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
