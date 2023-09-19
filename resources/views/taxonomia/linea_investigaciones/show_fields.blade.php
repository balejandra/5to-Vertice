<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $lineaInvestigacion->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $lineaInvestigacion->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($lineaInvestigacion->created_at)
                    {{ date_format($lineaInvestigacion->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('lineaInvestigaciones.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
