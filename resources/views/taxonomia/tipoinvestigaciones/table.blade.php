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
        @foreach ($tipoInvestigaciones as $tipoinvestigacion)
            <tr>
                <td>{{ $tipoinvestigacion->id }}</td>
                <td>{{ $tipoinvestigacion->nombre }}</td>
                <td>
                    @can('consultar-tipoinvestigacion')
                        <a class="btn btn-sm btn-success" href="{{ route('tipoInvestigaciones.show', [$tipoinvestigacion->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-tipoinvestigacion')
                        <a class="btn btn-sm btn-info" href="{{ route('tipoInvestigaciones.edit', [$tipoinvestigacion->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-tipoinvestigacion')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['tipoInvestigaciones.destroy', $tipoinvestigacion->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="el tipo de investigación {{ $tipoinvestigacion->nombre }}">
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
