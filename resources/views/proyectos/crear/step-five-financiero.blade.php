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

                            <form class="was-validated" method="POST"
                                action="{{ route('proyectos.postStep5.financiero') }}" style="min-height:200px">
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
                                    <div class="col-md-3"> <label for="title">% Ejecución Física:</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" placeholder="0"
                                                onkeydown="return soloNumeros(event)" name="porcentaje_ejecucion_fisica"
                                                aria-label="Recipient's username"
                                                value="{{ $proyecto->porcentaje_ejecucion_fisica ?? '' }}">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                            <div class="valid-feedback">
                                                No obligatorio.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Costo Total del Proyecto:</label>
                                            <input type="text" lang="es-ES" class="form-control coin"
                                                placeholder="0,00" onkeydown="return soloNumeros(event)"
                                                name="costo_total_proyecto" required id="costo_total_proyecto"
                                                value="{{ number_format($proyecto->costo_total_proyecto, 2, ',', '.') ?? '' }}">
                                            <div class="invalid-feedback">
                                                Coto Total Requerido.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Costo del Proyecto si Fuese ejecutado por
                                                Transnacional:</label>
                                            <input type="text" class="form-control coin" placeholder="0.00"
                                                onkeydown="return soloNumeros(event)" id="1"
                                                name="costo_transnacional"
                                                value="{{ number_format($proyecto->costo_transnacional, 2, ',', '.') ?? '' }}">
                                            <div class="valid-feedback">
                                                No obligatorio.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title">Ahorro de la Nación:</label>
                                            <input type="text" class="form-control coin" placeholder="0.00"
                                                onkeydown="return soloNumeros(event)" id="1" name="ahorro_nacion"
                                                value="{{ number_format($proyecto->ahorro_nacion, 2, ',', '.') ?? '' }}">
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
    @push('scripts')
        <script>
            function formatCurrencyInput(inputElement) {
                inputElement.addEventListener('input', (e) => {
                    var entrada = e.target.value.split(','),
                        parteEntera = entrada[0].replace(/\./g, ''),
                        parteDecimal = entrada[1],
                        salida = parteEntera.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");

                    e.target.value = salida + (parteDecimal !== undefined ? ',' + parteDecimal : '');
                }, false);
            }

            // Obtén todos los elementos con la clase "costo_total_proyecto" y aplica la función
            var elementosConClase = document.querySelectorAll('.coin');
            elementosConClase.forEach(function(elemento) {
                formatCurrencyInput(elemento);
            });

            function soloNumeros(event) {
                if (
                    ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) &&
                        event.keyCode !== 190 && event.keyCode !== 110 && event.keyCode !== 188 && event.keyCode !==
                        8 && event
                        .keyCode !== 9)
                ) {
                    return false;
                }
            }
        </script>
    @endpush
@endsection
