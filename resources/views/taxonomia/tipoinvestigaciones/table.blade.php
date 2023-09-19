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
        @foreach ($tipoInvestigaciones as $tipoInvestigacion)
            <tr>
                <td>{{ $tipoInvestigacion->id }}</td>
                <td>{{ $tipoInvestigacion->nombre }}</td>
                <td>
                    <a class="btn btn-sm btn-success"
                        href="{{ route('tipoInvestigaciones.show', [$tipoInvestigacion->id]) }}">
                        <i class="fa fa-search"></i>
                    </a>
                    <a class="btn btn-sm btn-info"
                        href="{{ route('tipoInvestigaciones.edit', [$tipoInvestigacion->id]) }}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <div class='btn-group'>
                        {{ html()->form('DELETE')->route('tipoInvestigaciones.destroy', [$tipoInvestigacion->id])->class('delete-form')->open() }}
                        <button type="submit" class="btn btn-sm btn-danger" id="eliminar"
                            data-mensaje="el tipo de investigación {{ $tipoInvestigacion->nombre }}">
                            <i class="fa fa-trash"></i>
                        </button>
                        {{ html()->form()->close() }}
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
