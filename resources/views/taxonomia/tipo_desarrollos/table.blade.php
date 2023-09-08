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
        @foreach ($tipoDesarrollos as $tipoDesarrollo)
            <tr>
                <td>{{ $tipoDesarrollo->id }}</td>
                <td>{{ $tipoDesarrollo->nombre }}</td>
                <td>
                    @can('consultar-tipodesarrollo')
                        <a class="btn btn-sm btn-success" href="{{ route('tipoDesarrollos.show', [$tipoDesarrollo->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-tipodesarrollo')
                        <a class="btn btn-sm btn-info" href="{{ route('tipoDesarrollos.edit', [$tipoDesarrollo->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-tipodesarrollo')
                        <div class='btn-group'>
                            {!! Form::open([
                                'route' => ['tipoDesarrollos.destroy', $tipoDesarrollo->id],
                                'method' => 'delete',
                                'class' => 'delete-form',
                            ]) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="el tipo de desarrollo {{ $tipoDesarrollo->nombre }}">
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
