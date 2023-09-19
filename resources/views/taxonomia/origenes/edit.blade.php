@extends('layouts.app')
@section('titulo')
    Origen
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-check fa-lg"></i>
                            <strong>Editar Origen</strong>
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            {{ html()->modelForm($origenes, 'PUT', route('origenes.update', [$origenes->id]))->open() }}

                            @include('taxonomia.origenes.fields')

                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
