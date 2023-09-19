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
                    <a class="btn btn-sm btn-success" href="{{ route('tipoDesarrollos.show', [$tipoDesarrollo->id]) }}">
                        <i class="fa fa-search"></i>
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('tipoDesarrollos.edit', [$tipoDesarrollo->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <div class='btn-group'>
                        {{ html()->form('DELETE')->route('tipoDesarrollos.destroy', [$tipoDesarrollo->id])->class('delete-form')->open() }}
                        <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                            data-mensaje="el tipo de desarrollo {{ $tipoDesarrollo->nombre }}">
                            <i class="fa fa-trash"></i>
                        </button>
                        {{ html()->form()->close() }}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
