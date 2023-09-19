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
        @foreach ($tipoActividades as $tipoActividad)
            <tr>
                <td>{{ $tipoActividad->id }}</td>
                <td>{{ $tipoActividad->nombre }}</td>
                <td>
                    <a class="btn btn-sm btn-success" href="{{ route('tipoActividades.show', [$tipoActividad->id]) }}">
                        <i class="fa fa-search"></i>
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('tipoActividades.edit', [$tipoActividad->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <div class='btn-group'>
                        {{ html()->form('DELETE')->route('tipoActividades.destroy', [$tipoActividad->id])->class('delete-form')->open() }}
                        <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                            data-mensaje="el tipo de actividad {{ $tipoActividad->nombre }}">
                            <i class="fa fa-trash"></i>
                        </button>
                        {{ html()->form()->close() }}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
