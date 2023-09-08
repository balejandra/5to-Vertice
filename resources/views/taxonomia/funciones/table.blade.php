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
        @foreach ($funciones as $funcion)
            <tr>
                <td>{{ $funcion->id }}</td>
                <td>{{ $funcion->nombre }}</td>
                <td>
                    @can('consultar-funcion')
                        <a class="btn btn-sm btn-success" href="{{ route('funciones.show', [$funcion->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-funcion')
                        <a class="btn btn-sm btn-info" href="{{ route('funciones.edit', [$funcion->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-funcion')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['funciones.destroy', $funcion->id], 'method' => 'delete', 'class' => 'delete-form']) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="la función {{ $funcion->nombre }}">
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
