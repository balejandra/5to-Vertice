<div class="container">
    <strong class=" text-primary">
        DETALLE DEL PROYECTO</strong>
    <hr>
    <div class="row border">
        <div class="col-md-3 col-sm-3 p-2 bg-light  text-th"> Nro. de Planilla</div>
        <div class="col-md-3 col-sm-3 p-2">{{ $proyecto->nro_planilla }}</div>
        <div class="col-md-3 col-sm-3 p-2 bg-light text-th">Fecha de Solicitud</div>
        <div class="col-md-3 col-sm-3 p-2">
            @if ($proyecto->created_at)
                {{ date_format($proyecto->created_at, 'd-m-Y') }}
            @endif
        </div>
    </div>

    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Institución
        </div>
        <div class="col-md-3 col-sm-3 p-2 text-capitalize">
            {{ $proyecto->institucion->nombre }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th ">
            Nombre Solicitante
        </div>
        <div class="col-md-3 col-sm-3 p-2 text-capitalize">
            {{ $proyecto->user->nombres }} {{ $proyecto->user->apellidos }}
        </div>
    </div>

    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Nombre del Proyecto
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->nombre_proyecto }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Tiempo de Ejecución
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            <td>{{ $proyecto->tiempo_ejecucion }}</td>

        </div>
    </div>


    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Año de Ejecución
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->ano_ejecucion }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Metas Año Actual
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->metas_ano_actual }}
        </div>
    </div>


    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Información de Interés
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->informacion_interes }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Jefe de Proyecto
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->jefe_proyecto }}
        </div>
    </div>

    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Persona Contacto
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->persona_contacto }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Estatus
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->estatus->nombre }}
        </div>
    </div>

    <br>

    <strong class=" text-primary">TAXONOMÍA</strong>
    <hr>
    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Origen
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->origen->nombre }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Función
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->funcion->nombre }}
        </div>
    </div>
    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Tipo de Investigación
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->tipoInvestigacion->nombre }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Participación
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->participacion->nombre }}
        </div>
    </div>

    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Cadencia Investigativa
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->cadenciaInvestigativa->nombre }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Tipo de Desarrollo
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->tipoDesarrollo->nombre }}
        </div>
    </div>
    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Fin de Investigación
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->finInvestigacion->nombre }}
        </div>
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Tipo de Actividad
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->tipoActividad->nombre }}
        </div>
    </div>
    <div class="row border">
        <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
            Línea de Investigación
        </div>
        <div class="col-md-3 col-sm-3 p-2">
            {{ $proyecto->lineaInvestigacion->nombre }}
        </div>

    </div>
    <br>
    <strong class=" text-primary">FINANCIERO</strong>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    % Ejecución Física
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $proyecto->porcentaje_ejecucion_fisica * 100 }}%
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Costo Total del Proyecto
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ number_format($proyecto->costo_total_proyecto, 2, ',', '.')  }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Costo si fuese ejecutado por Transnacional
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ number_format( $proyecto->costo_transnacional, 2, ',', '.') }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Ahorro de la Nación
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ number_format($proyecto->ahorro_nacion, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <strong class=" text-primary">SOLUCIONES Y DESAFIOS</strong>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <div class="row border">
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Victoria Temprana
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $proyecto->victoria_temprana }}
                </div>
                <div class="col-md-3 col-sm-3 bg-light p-2 text-th">
                    Nudo Critico
                </div>
                <div class="col-md-3 col-sm-3 p-2">
                    {{ $proyecto->nudo_critico }}
                </div>
            </div>
        </div>
    </div>
    <br>
    <strong class=" text-primary">HISTÓRICO</strong>
    <hr>
    <table class="table table-hover nooptionsearch border table-grow" style="width: 100%">
        <thead>
            <tr>
                <th>Nombre y Apellido</th>
                <th>Accion</th>
                <th>Motivo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($revisiones as $revision)
                <tr>
                    <td>{{ $revision->user->nombres }} {{ $revision->user->apellidos }}</td>
                    <td>{{ $revision->accion }}</td>
                    <td>{{ $revision->motivo }}</td>
                    <td>{{ $revision->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br>
