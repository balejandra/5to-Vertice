@extends('layouts.app')
@section('titulo')
    Usuarios
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-user fa-lg"></i>
                            <strong>Editar Usuario</strong>
                            <div class="card-header-actions">
                            </div>
                        </div>
                        <div class="card-body">
                            {{ html()->modelForm($user, 'PUT', route('users.update', [$user->id]))->open() }}

                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6  border rounded p-3">
                                    @include('publico.users.fields')


                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            {{ html()->closeModelForm() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
