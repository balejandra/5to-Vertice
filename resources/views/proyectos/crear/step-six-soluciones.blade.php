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

                            <form class="was-validated" method="POST" action="{{ route('proyectos.store') }}" style="min-height:200px">
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

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Victoria Temprana:</label>
                                            <textarea class="form-control" name="victoria_temprana" rows="5" placeholder="Victoria Temprana">{{ $proyecto->victoria_temprana ?? '' }}</textarea>
                                            <div class="valid-feedback">
                                                No obligatorio.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Nudo Crítico:</label>
                                            <textarea class="form-control" name="nudo_critico" rows="5" placeholder="Nudo Crítico">{{ $proyecto->nudo_critico ?? '' }}</textarea>
                                            <div class="valid-feedback">
                                                No obligatorio.
                                            </div>
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
    </div>
@endsection
