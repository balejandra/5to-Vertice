<table id="generic-table" class="table table-striped table-bordered compact display" style="width:100%">
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
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
