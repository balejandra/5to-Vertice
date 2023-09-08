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
        @foreach ($origenes as $origen)
            <tr>
                <td>{{ $origen->id }}</td>
                <td>{{ $origen->nombre }}</td>
                <td>
                    @can('consultar-origen')
                        <a class="btn btn-sm btn-success" href="  {{ route('origenes.show', [$origen->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-origen')
                        <a class="btn btn-sm btn-info" href=" {{ route('origenes.edit', [$origen->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-origen')
                        <div class='btn-group'>
                            {!! Form::open(['route' => ['origenes.destroy', $origen->id], 'method' => 'delete', 'class' => 'delete-form']) !!}

                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="el origen {{ $origen->nombre }}">
                                <i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        </div>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
