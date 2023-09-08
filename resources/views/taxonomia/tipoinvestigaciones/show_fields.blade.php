<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $tipoInvestigacion->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $tipoInvestigacion->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($tipoInvestigacion->created_at)
                    {{ date_format($tipoInvestigacion->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">

    <a href="{{ route('tipoInvestigaciones.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
