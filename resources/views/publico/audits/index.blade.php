@extends('layouts.app')
@section('titulo')
    Auditoría
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>
                            Auditoría
                        </div>
                        <div class="card-body">
                            @include('publico.audits.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
