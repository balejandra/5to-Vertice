<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $finInvestigacion->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $finInvestigacion->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($finInvestigacion->created_at)
                    {{ date_format($finInvestigacion->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('finInvestigaciones.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
