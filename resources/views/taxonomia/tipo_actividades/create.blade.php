@extends('layouts.app')

@section('titulo')
    Tipo de Actividades
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
                            <strong>Tipo de Actividades</strong>
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('tipoActividades.create') }}">Nuevo</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::open(['route' => 'tipoActividades.store']) !!}
                            @include('taxonomia.tipo_actividades.fields')
                            {!! Form::close() !!}
                            <div class="pull-right mr-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
