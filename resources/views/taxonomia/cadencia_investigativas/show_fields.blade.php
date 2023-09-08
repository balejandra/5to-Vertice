<table class="table">
    <tbody>
        <tr>
            <th class="bg-light">ID</th>
            <td>{{ $cadenciaInvestigativa->id }}</td>
        </tr>
        <tr>
            <th class="bg-light">Nombre</th>
            <td>{{ $cadenciaInvestigativa->nombre }}</td>
        </tr>
        <tr>
            <th class="bg-light">Creado</th>
            <td>
                @if ($cadenciaInvestigativa->created_at)
                    {{ date_format($cadenciaInvestigativa->created_at, 'd-m-Y') }}
                @endif
            </td>
        </tr>

        <!-- Agregar más campos si es necesario -->

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">
    <a href="{{ route('cadenciaInvestigativas.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
</div>
