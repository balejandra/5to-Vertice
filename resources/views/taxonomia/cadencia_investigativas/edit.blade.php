@extends('layouts.app')

@section('titulo')
    Cadencia Investigativas
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
                                <!-- Agregar acciones si es necesario -->
                            </div>
                        </div>
                        <div class="card-body">
                            {!! Form::model($cadenciaInvestigativa, [
                                'route' => ['cadenciaInvestigativas.update', $cadenciaInvestigativa->id],
                                'method' => 'patch',
                            ]) !!}
                            @include('taxonomia.cadencia_investigativas.fields')
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
