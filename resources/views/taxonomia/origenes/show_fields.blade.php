<table class="table">
    <tbody>
    <tr>
        <th class="bg-light">ID</th>
        <td>{{$origenes->id}}</td>
    </tr>
    <tr>
        <th class="bg-light">Nombre</th>
        <td>{{ $origenes->nombre }}</td>
    </tr>
    <tr>
        <th class="bg-light">Creado</th>
        <td>
        @if ($origenes->created_at)
           {{date_format( $origenes->created_at,'d-m-Y') }}
        @endif
        </td>
    </tr>

    </tbody>
</table>
<div class="form-group col-sm-12 text-center">

        <a href="{{ route('origenes.index') }}" class="btn  btncancelarZarpes">Cancelar</a>
    </div>
