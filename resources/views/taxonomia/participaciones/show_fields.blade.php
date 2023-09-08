<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $participacion->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $participacion->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($participacion->created_at)
                    {{ date_format($participacion->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('participaciones.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
