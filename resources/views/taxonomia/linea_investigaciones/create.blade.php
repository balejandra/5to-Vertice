@extends('layouts.app')

@section('titulo')
    Líneas de Investigación
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check fa-lg"></i>
                        <strong>Crear Línea de Investigación</strong>
                        <div class="card-header-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('lineaInvestigaciones.store') }}" method="post">
                            @csrf
                            @include('taxonomia.linea_investigaciones.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
