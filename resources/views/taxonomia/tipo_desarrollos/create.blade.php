@extends('layouts.app')

@section('titulo')
    Tipos de Desarrollo
@endsection

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-check fa-lg"></i>
                        <strong>Crear Tipo de Desarrollo</strong>
                        <div class="card-header-actions">

                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tipoDesarrollos.store') }}" method="post">
                            @csrf
                            @include('taxonomia.tipo_desarrollos.fields')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
