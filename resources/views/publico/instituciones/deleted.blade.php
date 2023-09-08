@extends('layouts.app')
@section('titulo')
    Institución Eliminada
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header btncancelarZarpes text-white">
                            <i class="fa-solid fa-shop-slash"></i>
                            <strong>Instituciones Eliminados</strong>
                            @can('crear-usuario')
                                <div class="card-header-actions">
                                    <a class="btn btn-primary btn-sm" href="{{ route('instituciones.index') }}">Volver a
                                        Instituciones</a>
                                </div>
                            @endcan
                        </div>
                        <div class="card-body">
                            <style>
                                table.dataTable {
                                    margin: 0 auto;
                                }
                            </style>
                            <table class="table table-striped table-bordered table-grow" id="generic-table"
                                style="width:70%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Sigla</th>
                                        <th>Sector</th>
                                        <th width="30%">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($instituciones as $institucion)
                                        <tr>
                                            <td>{{ $institucion->nombre }}</td>
                                            <td>{{ $institucion->sigla }}</td>
                                            <td>{{ $institucion->sector->nombre }}</td>
                                            <td>
                                                @can('eliminar-usuario')
                                                    <a class="btn btn-sm btn-warning confirmation_other" data-action="RESTAURAR"
                                                        data-route="  {{ route('institucionDeleted.restore', [$institucion->id]) }}">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
