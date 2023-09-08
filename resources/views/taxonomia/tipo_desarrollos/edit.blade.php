@extends('layouts.app')

@section('titulo')
    Tipos de Desarrollo
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Editar Tipo de Desarrollo</strong>
                            <div class="card-header-actions">
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($tipoDesarrollo, [
                                'route' => ['tipoDesarrollos.update', $tipoDesarrollo->id],
                                'method' => 'patch',
                            ]) !!}
                            @include('taxonomia.tipo_desarrollos.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
