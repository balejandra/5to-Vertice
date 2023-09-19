@extends('layouts.app')
@section('titulo')
    Menús
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-bars fa-lg"></i>
                            <strong>Crear {{ $titulo }}</strong>
                            <div class="card-header-actions">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 col-md-3"></div>
                                <div class=" border col-lg-8 col-md-12 col-sm-12 col-xs-12 p-3">
                                    <form method="POST" action="{{ route('menus.store') }}">
                                        @csrf
                                        @include('publico.menus.fields')
                                    </form>
                                </div>
                                <div class=" col-lg-2 col-md-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
