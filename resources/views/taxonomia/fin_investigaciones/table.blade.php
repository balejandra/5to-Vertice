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
        @foreach ($finInvestigaciones as $finInvestigacion)
            <tr>
                <td>{{ $finInvestigacion->id }}</td>
                <td>{{ $finInvestigacion->nombre }}</td>
                <td>
                    @can('consultar-fininvestigacion')
                        <a class="btn btn-sm btn-success" href="{{ route('finInvestigaciones.show', [$finInvestigacion->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-fininvestigacion')
                        <a class="btn btn-sm btn-info" href="{{ route('finInvestigaciones.edit', [$finInvestigacion->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-fininvestigacion')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['finInvestigaciones.destroy', $finInvestigacion->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="el fin de investigación {{ $finInvestigacion->nombre }}">
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
