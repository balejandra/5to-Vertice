@component('mail::message')

{{$mensaje}}
@component('mail::panel')
    <b>Nro. de Planilla:</b> {{ $nro }} <br>
    <b>Nombre:</b> {{ $nombre }} <br>
    <b>Costo total:</b> {{ $costo_total }} <br>
    @if ($idstatus==2)
    <h2>Motivo Rechazo: {{$motivo}} </h2>
    @endif
@endcomponent
@component('mail::subcopy')
    FUDIVIT
@endcomponent
@component('mail::footer')
    Sugerencia: Agregue {{$from}} a sus contactos de correo electrónico para así evitar recibir este correo en spam.
    Gracias,
@endcomponent
@endcomponent
