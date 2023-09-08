<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $funcion->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $funcion->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($funcion->created_at)
                    {{ date_format($funcion->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group col-sm-12 text-center">
    <a href="{{ route('funciones.index') }}" class="btn btn-secondary">Volver</a>
</div>
