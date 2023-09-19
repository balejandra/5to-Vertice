@extends('layouts.app')
@section('titulo')
    Estatus
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-clipboard-check fa-lg"></i>
                            <strong>Editar Estatus</strong>
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            {{ html()->modelForm($status, 'PUT', route('estatus.update', [$status->id]))->open() }}
                            @include('publico.estatus.fields')

                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
