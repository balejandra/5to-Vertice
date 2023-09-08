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
        @foreach ($cadenciaInvestigativas as $cadenciaInvestigativa)
            <tr>
                <td>{{ $cadenciaInvestigativa->id }}</td>
                <td>{{ $cadenciaInvestigativa->nombre }}</td>
                <td>
                    @can('consultar-cadenciainvestigativa')
                        <a class="btn btn-sm btn-success"
                            href="{{ route('cadenciaInvestigativas.show', [$cadenciaInvestigativa->id]) }}">
                            <i class="fa fa-search"></i>
                        </a>
                    @endcan
                    @can('editar-cadenciainvestigativa')
                        <a class="btn btn-sm btn-info"
                            href="{{ route('cadenciaInvestigativas.edit', [$cadenciaInvestigativa->id]) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    @endcan
                    @can('eliminar-cadenciainvestigativa')
                        <div class='btn-group'>
                            {!! Form::open([
                                'route' => ['cadenciaInvestigativas.destroy', $cadenciaInvestigativa->id],
                                'method' => 'delete',
                                'class' => 'delete-form',
                            ]) !!}
                            <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                                data-mensaje="la cadencia investigativa {{ $cadenciaInvestigativa->nombre }}">
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
