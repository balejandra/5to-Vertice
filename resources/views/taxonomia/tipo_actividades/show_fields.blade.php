<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $tipoActividad->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $tipoActividad->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($tipoActividad->created_at)
                    {{ date_format($tipoActividad->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('tipoActividades.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
