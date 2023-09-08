@extends('layouts.app')
@section('titulo')
    Roles
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-id-badge fa-lg"></i>
                            <strong>Crear rol</strong>
                            <div class="card-header-actions">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 col-lg-8 col-sm-12 border rounded py-3">

                                    <form action="{{ route('roles.store') }} " method="post" class="needs-validation"
                                        novalidate>
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12 col-lg-4">
                                                <div class="form-group">
                                                    <label for="nombre">Nombre:</label>
                                                    <input type="text" class="form-control " id="name"
                                                        placeholder="Nombre del rol" name="name"
                                                        value="{{ old('name') }}" required>
                                                    @if ($errors->has('name'))
                                                        <span class="error text-danger" for='input-name'>
                                                            {{ $errors->first('name') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="h6 mt-3">Permisos:</label>

                                                <div class="container">
                                                    <div class="row">
                                                        @foreach ($permissions as $id => $permission)
                                                            <div class="form-check form-switch col-sm-4 ">

                                                                <input class="form-check-input" type="checkbox"
                                                                    name="permissions[]" id='{{ $id }}'
                                                                    value="{{ $id }}" style="margin-left: auto;">
                                                                <label class="form-check-label" for="flexSwitchCheckDefault"
                                                                    style="margin-inline-start: 30px;">{{ $permission }}</label>

                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row  mt-4">
                                            <div class="col text-center">
                                                <a href="{{ route('roles.index') }} "
                                                    class="btn btn-primary btncancelarZarpes">Cancelar</a>
                                            </div>
                                            <div class="col text-center  ">
                                                <button type="submit" class="btn btn-primary btn-bg-inea">Guardar</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-2"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
