<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $tipoDesarrollo->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $tipoDesarrollo->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($tipoDesarrollo->created_at)
                    {{ date_format($tipoDesarrollo->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('tipoDesarrollos.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>