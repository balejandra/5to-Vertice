<table class="table table-striped table-bordered compact display" style="width:100%">
    <thead>
        <tr>
            <th data-priority="1">Nro Planilla</th>
            <th>Fecha de planilla</th>
            <th>Institución</th>
            <th>Nombre Proyecto</th>
            <th>Costo Total del Proyecto</th>
            <th data-priority="2">Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->nro_planilla }}</td>
                <td>{{ $proyecto->created_at }}</td>
                <td>{{ $proyecto->institucion->nombre }}</td>
                <td>{{ $proyecto->nombre_proyecto }}</td>
                <td>{{ $proyecto->costo_total_proyecto }}</td>

                <td>{{ $proyecto->estatus->nombre }} </td>

                <td>
                    @can('consultar-proyecto')
                        <a class="btn btn-sm btn-primary" href=" {{ route('proyectos.show', $proyecto->id) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @if ($proyecto->estatus->id == '1')
                        @can('revisar-proyecto')
                            <a data-route="{{ route('proyectos.updateStatus', [$proyecto->id, 'revisar']) }}"
                                class="btn btn-success btn-sm confirmation" title="Revisar" data-action="REVISAR">
                                <i class="fa fa-check"></i>
                            </a>
                        @endcan
                    @endif
                    @if ($proyecto->estatus->id == '1' || $proyecto->estatus->id == '2')
                        @can('devolver-proyecto')
                            <!-- Button trigger modal -->
                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-rechazo"
                                onclick="modalDevolver({{ $proyecto->id }},'{{ $proyecto->nro_planilla }}')">
                                <i class="fa fa-ban"></i>
                            </a>
                        @endcan
                        @can('aprobar-proyecto')
                            <a data-route="{{ route('proyectos.updateStatus', [$proyecto->id, 'aprobar']) }}"
                                class="btn btn-success btn-sm confirmation" title="Aprobar" data-action="APROBAR">
                                <i class="fa-solid fa-check-double"></i>
                            </a>
                        @endcan
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<!-- Modal Rechazar -->
<div class="modal fade" id="modal-rechazo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form id="devolver_proyecto" action="" class="modal-form">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Devolver Planilla Proyecto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Por favor indique el motivo de la devolución de la Planilla Nro. <span id="nro_planilla"></span>
                    </p>
                    <div class="col-sm-12">
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="motivo" id="motivo1" name="motivo"
                                onchange="motivoDevolucion();" required>
                                <option value="">Seleccione un motivo</option>
                                <option value="Disposiciones del Ejecutivo Nacional">Disposiciones del Ejecutivo
                                    Nacional.</option>
                                <option value="Instrucciones especiales de la autoridad acuática">Instrucciones
                                    especiales de la autoridad acuática.</option>
                                <option value="Condiciones meteorológicas adversas">Condiciones meteorológicas adversas.
                                </option>
                                <option value="Observaciones en los documentos">Observaciones en los documentos</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 form-group" style="display: none" id="inputmotivo">
                        <input type="text" class="form-control" name="motivo" id="motivo2">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-action="DEVOLVER">Devolver</button>
                </div>
            </div>
        </div>
    </form>
</div>
