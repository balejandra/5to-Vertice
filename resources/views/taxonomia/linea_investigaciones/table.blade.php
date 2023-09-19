<style>
    table.dataTable {
        margin: 0 auto;
    }
</style>
<table class="table table-striped table-bordered table-grow" id="generic-table" style="width:60%">
    <thead>
        <th>ID</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </thead>
    <tbody>
        @foreach ($lineaInvestigaciones as $lineaInvestigacion)
            <tr>
                <td>{{ $lineaInvestigacion->id }}</td>
                <td>{{ $lineaInvestigacion->nombre }}</td>
                <td>
                    @can('consultar-linea-investigacion')
                        <a class="btn btn-sm btn-success" href="{{ route('lineaInvestigaciones.show', [$lineaInvestigacion->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-linea-investigacion')
                        <a class="btn btn-sm btn-info" href="{{ route('lineaInvestigaciones.edit', [$lineaInvestigacion->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-linea-investigacion')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['lineaInvestigaciones.destroy', $lineaInvestigacion->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="la línea de investigación {{ $lineaInvestigacion->nombre }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
