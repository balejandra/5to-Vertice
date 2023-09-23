@component('mail::message')

Saludos,

{{ $mensaje }}


@component('mail::panel')
    Detalles del proyecto: <br>
        <b>Nro. de Planilla:</b> {{ $nro }} <br>
        <b>Nombre:</b> {{ $nombre }} <br>
        <b>Institución:</b> {{ $institucion }} <br>
        <b>Jefe de Proyecto:</b> {{ $jefe_proyecto }} <br>
        <b>Costo total:</b> {{ $costo_total }} <br>
@endcomponent
@component('mail::subcopy')
        FUDIVIT
@endcomponent
@component('mail::footer')
        Sugerencia: Agregue {{ $from }} a sus contactos de correo electrónico para así evitar recibir este correo en spam.
        Gracias,
@endcomponent
@endcomponent
