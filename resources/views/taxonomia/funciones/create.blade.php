@extends('layouts.app')

@section('titulo')
    Funciones
@endsection

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Crear Función</strong>
                            <div class="card-header-actions">
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'funciones.store']) !!}
                            @include('taxonomia.funciones.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
