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
                                <form action="{{ route('busqueda.queries') }}" method="post">
                                    <div class="row align-self-start">
                                        <span class="title-estadia">Busqueda de Proyectos</span>
                                        <br>
                                        <div class="clearfix"></div>
                                        <div class="form-group col-sm-2">
                                            <label for="nro_planilla">Nro de Planilla:</label>
                                            <input type="text" name="nro_planilla" class="form-control">
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="institucion">Institucion:</label>
                                            {{ html()->select()->name('institucion_id')->options($instituciones)->value($user->institucion_id ?? '')->class('form-control custom-select')->placeholder('Puede asignar una Institución...')->required()->render() }}
                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="sector">Sector:</label>
                                            {{ html()->select()->name('sector_id')->options($sectores)->value($institucion->sector_id ?? '')->placeholder('Seleccion un sector')->class('form-control custom-select')->render() }}

                                        </div>
                                        <div class="form-group col-sm-2">
                                            <label for="estatus">Estatus:</label>
                                            {{ html()->select()->name('estatus_id')->options($estatus)->value($institucion->sector_id ?? '')->placeholder('Estatus...')->class('form-control custom-select')->render() }}
                                        </div>
                                        <div class="clearfix"></div>





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
                                            {!! Form::label('fecha_inicial', 'Fecha Inicio:') !!}
                                            <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial"
                                                maxlength="10">
                                        </div>
                                        <div class="form-group col-sm-2" id="rangoFechafin-div" style="display: none">
                                            {!! Form::label('fecha_final', 'Fecha Fin:') !!}
                                            <input type="date" class="form-control" id="fecha_final" name="fecha_final"
                                                maxlength="10">
                                        </div>
                                        <div class="form-group col-sm-2">


                                        </div>
                                        <div class="form-group col-sm-2 d-flex align-items-end">
                                            {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                        <br>
                                    </div>

                                    <hr class="dropdown-divider">
                                    <br>
                                </form>

                                @include('proyectos.busqueda.table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan
    @endsection
