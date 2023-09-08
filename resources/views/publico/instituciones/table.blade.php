<style>
    table.dataTable {
        margin: 0 auto;
    }
</style>
<table class="table table-striped table-bordered table-grow" id="generic-table" style="width:50%">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Sigla</th>
            <th>Sector</th>
            <th width="30%">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($instituciones as $institucion)
            <tr>
                <td>{{ $institucion->nombre }}</td>
                <td>{{ $institucion->sigla }}</td>
                <td>{{ $institucion->sector->nombre }}</td>
                <td>
                    @can('consultar-institucion')
                        <a class="btn btn-sm btn-success" href="  {{ route('instituciones.show', [$institucion->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-institucion')
                        <a class="btn btn-sm btn-info" href=" {{ route('instituciones.edit', [$institucion->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-institucion')
                        <div class='btn-group'>
                            {!! Form::open([
                                'route' => ['instituciones.destroy', $institucion->id],
                                'method' => 'delete',
                                'class' => 'delete-form',
                            ]) !!}

                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="la Capitania {{ $institucion->nombre }}">
                                <i class="fa fa-trash"></i></button>
                            {!! Form::close() !!}
                        </div>
                    @endcan
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
