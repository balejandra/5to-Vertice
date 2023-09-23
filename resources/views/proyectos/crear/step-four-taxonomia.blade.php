@extends('layouts.app')
@section('titulo')
    Proyectos
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <i class="fa fa-sheet-plastic"></i>
                            <strong>Planilla de Proyectos</strong>
                            <div class="card-header-actions">
                                <a class="btn btn-primary btn-sm" href="{{ route('proyectos.index') }}">Cancelar</a>
                            </div>
                        </div>
                        <div class="card-body" style="min-height: 350px;">
                            @include('proyectos.crear.stepsIndicator')

                            <form class="was-validated" method="POST" action="{{ route('proyectos.postStep4.taxonomia') }}"
                                style="min-height:200px">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="row gy-2 gx-3 m-4 pt-4 justify-content-center">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Origen:</label>
                                            {{ html()->select('origen_id')->options($origen)->value($proyecto->origen_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Origen Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Función:</label>
                                            {{ html()->select('funcion_id')->options($funciones)->value($proyecto->funcion_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Función Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Tipo de Investigación:</label>
                                            {{ html()->select('tipo_investigacion_id')->options($tipoInvestigaciones)->value($proyecto->tipo_investigacion_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Tipo de Investigación Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Participación:</label>
                                            {{ html()->select('participacion_id')->options($participaciones)->value($proyecto->participacion_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Participación Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Cadencia Investigativa:</label>
                                            {{ html()->select('cadencia_investigativa_id')->options($cadenciasInvestigativas)->value($proyecto->cadencia_investigativa_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Cadencia Investigativa Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Tipo de Desarrollo:</label>
                                            {{ html()->select('tipo_desarrollo_id')->options($tiposDesarrollo)->value($proyecto->tipo_desarrollo_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Tipo de Desarrollo Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Fin de la Investigación:</label>
                                            {{ html()->select('fin_investigacion_id')->options($finesInvestigacion)->value($proyecto->fin_investigacion_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Fin de la Investigación Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Tipo de Actividad:</label>
                                            {{ html()->select('tipo_actividad_id')->options($tiposActividad)->value($proyecto->tipo_actividad_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Tipo de Actividad Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="title">Línea de Investigación:</label>
                                            {{ html()->select('linea_investigacion_id')->options($lineasInvestigacion)->value($proyecto->linea_investigacion_id ?? '')->class('form-select')->placeholder('Seleccione un opción')->required() }}
                                            <div class="invalid-feedback">
                                                Línea de Investigación Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                        </div>
                        @include('proyectos.crear.footer-buttons')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
