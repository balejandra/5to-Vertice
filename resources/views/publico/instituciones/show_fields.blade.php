<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th width="30%" class="bg-light">Nombre</th>
                    <td> {{ $institucion->nombre }} </td>
                </tr>
                <tr>
                    <th class="bg-light">Siglas</th>
                    <td> {{ $institucion->sigla }}</td>
                </tr>
                <tr>
                    <th class="bg-light">Sector asignado</th>
                    <td>
                        {{ $institucion->sector->nombre }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <dic class="col-md-2"></dic>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-md-2"></div>
    <div class="text-center col-md-8">
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <a href="{{ route('instituciones.index') }} " class="btn btn-primary btncancelarZarpes">Cancelar</a>
            </div>
        </div>
    </div>

    <div class="col-md-2"></div>

</div>
