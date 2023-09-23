<div class="p-4 notification-content-header">
    <h4>
        {{ $notificacion->titulo }}</h4>

    <div class="col text-left text-body-tertiary">
        {{ $notificacion->tipo }}
    </div>
    <div class="col text-right text-body-tertiary">
        <small>
            @if ($notificacion->created_at)
                {{ $notificacion->created_at->format('Y-m-d') }}
            @endif
        </small>
    </div>
</div>
</div>
<br>
<div class="notification-content">
    <p>{{ $notificacion->contenido }}</p>
</div>
