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

                            <form method="POST" action="{{ route('proyectos.postStep1.datos') }}" style="min-height:200px">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Nombre:</label>
                                            <input type="text" class="form-control" placeholder="Nombre"
                                                name="nombre_proyecto" value="{{ $proyecto->nombre_proyecto ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Tiempo de Ejecución:</label>
                                            <input type="text" class="form-control" placeholder="Tiempo de Ejecución"
                                                name="tiempo_ejecucion" value="{{ $proyecto->tiempo_ejecucion ?? '' }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Año de Ejecución:</label>
                                            <input type="text" class="form-control" placeholder="Año de Ejecución"
                                                name="ano_ejecucion" value="{{ $proyecto->ano_ejecucion ?? '' }}">
                                        </div>
                                    </div>
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
