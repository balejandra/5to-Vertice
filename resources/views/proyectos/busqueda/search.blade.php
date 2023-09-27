@extends('layouts.app')
@section('titulo')
    Proyectos | Busqueda
@endsection
@section('content')
    @can('show-busqueda')
        <div class="container-fluid">
            <div class="animated fadeIn">
                @include('flash::message')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-search-plus"></i>
                                <strong>Busqueda</strong>
                                <div class="card-header-actions">

                                </div>
                            </div>
                            <div class="card-body" style="min-height: 350px;">
                                <form id="busquedaForm" action="{{ route('busqueda.queries') }}" method="post">
                                    @csrf
                                    <div class="row align-self-start">
                                        <span class="title-estadia">Busqueda de Proyectos</span>
                                        <br>
                                        <div class="clearfix"></div>
                                        <div class="form-group col-sm-3">
                                            <label for="nro_planilla">Nro de Planilla:</label>
                                            <input type="text" name="nro_planilla" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="institucion">Institucion:</label>
                                            <select name="institucion_id[]" id="institucion_id" data-live-search="true"
                                                data-width="100%" class="form-control custom-select selectpicker" multiple
                                                data-dropup-auto="false" data-actions-box="true"
                                                title="Seleccione una opción...">
                                                @foreach ($instituciones as $clave => $valor)
                                                    <option value="{{ $clave }}"> {{ $valor }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-3">
                                            <label for="sector">Sector:</label>
                                            <select name="sector_id[]" id="sector_id" data-live-search="true" data-width="100%"
                                                class="form-control custom-select selectpicker" multiple
                                                data-dropup-auto="false" data-actions-box="true"
                                                title="Seleccione una opción...">
                                                @foreach ($sectores as $clave => $valor)
                                                    <option value="{{ $clave }}"> {{ $valor }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="estatus">Estatus:</label>
                                            <select name="estatus_id[]" id="estatus_id" data-live-search="true"
                                                data-width="100%" class="form-control custom-select selectpicker" multiple
                                                data-dropup-auto="false" data-actions-box="true"
                                                title="Seleccione una opción...">
                                                @foreach ($estatus as $clave => $valor)
                                                    <option value="{{ $clave }}"> {{ $valor }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Origen:</label>
                                                <select name="origen_id[]" id="origen_id" data-live-search="true"
                                                    data-width="100%" class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($origen as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Función:</label>
                                                <select name="funcion_id[]" id="funcion_id" data-live-search="true"
                                                    data-width="100%" class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($funciones as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Tipo de Investigación:</label>
                                                <select name="tipo_investigacion_id[]" id="tipo_investigacion_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($tipoInvestigaciones as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Participación:</label>
                                                <select name="participacion_id[]" id="participacion_id" data-live-search="true"
                                                    data-width="100%" class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($participaciones as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Cadencia Investigativa:</label>
                                                <select name="cadencia_investigativa_id[]" id="cadencia_investigativa_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($cadenciasInvestigativas as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Tipo de Desarrollo:</label>
                                                <select name="tipo_desarrollo_id[]" id="tipo_desarrollo_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($tiposDesarrollo as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Fin de la Investigación:</label>
                                                <select name="fin_investigacion_id[]" id="fin_investigacion_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($finesInvestigacion as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Tipo de Actividad:</label>
                                                <select name="tipo_actividad_id[]" id="tipo_actividad_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($tiposActividad as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="title">Línea de Investigación:</label>
                                                <select name="linea_investigacion_id[]" id="linea_investigacion_id"
                                                    data-live-search="true" data-width="100%"
                                                    class="form-control custom-select selectpicker" multiple
                                                    data-dropup-auto="false" data-actions-box="true"
                                                    title="Seleccione una opción...">
                                                    @foreach ($lineasInvestigacion as $clave => $valor)
                                                        <option value="{{ $clave }}"> {{ $valor }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="form-group col-sm-2">
                                            <label for="Fecha">Fecha:</label>

                                            <input type="date" class="form-control" id="fecha_unica" name="fecha_unica"
                                                maxlength="10" onchange="changeFiltroFecha();" onemptied="">
                                        </div>
                                        <div class="form-group mt-4 col-sm-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="rango_fecha"
                                                    id="rango_fecha" value="1" onclick="mostrarRangoFechas()"
                                                    autocomplete="off">
                                                <label class="form-check-label" for="natural">
                                                    Rango de Fechas
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-2" id="rangoFechainicio-div" style="display: none">
                                            <label for="fecha_inicial">Fecha Inicio:</label>

                                            <input type="date" class="form-control" id="fecha_inicial"
                                                name="fecha_inicial" maxlength="10">
                                        </div>
                                        <div class="form-group col-sm-2" id="rangoFechafin-div" style="display: none">
                                            <label for="fecha_final">Fecha Fin:</label>
                                            <input type="date" class="form-control" id="fecha_final" name="fecha_final"
                                                maxlength="10">
                                        </div>
                                        <div class="form-group col-sm-2">


                                        </div>
                                        <div class="form-group col-sm-2 d-flex align-items-end">
                                            <button type="button" class="btn btn-primary"
                                                onclick="enviarBusqueda();">Buscar</button>
                                        </div>
                                        <br>
                                    </div>

                                    <hr class="dropdown-divider">
                                    <br>
                                </form>
                                <div id="tablaBusqueda" >
                                    <!-- Contenido de la notificación se cargará aquí -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
        @push('scripts')
            <script src="{{ asset('js/consultas.js') }}"></script>
        @endpush
    @endsection
