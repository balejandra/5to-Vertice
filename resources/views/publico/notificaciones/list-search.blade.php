<!-- proyectos.notificaciones.list.blade.php -->
@foreach ($notificaciones as $notification)
    <!-- Enlace a la notificación -->
    <a href="#" id="notification-link" onclick="showNotificacion({{ $notification->id }});"
        class="{{ $notification->visto != true ? 'unread' : '' }} notification-link d-none d-lg-block"
        data-notification-id="{{ $notification->id }}">
        <p class="notificacion-title mb-1">{{ $notification->titulo }}
            <span class="badge text-bg-info">{{ $notification->tipo }}</span>
        </p>
        <p class="mb-1">{{ Str::limit($notification->contenido, 50) }}</p>
        <p class="text-body-tertiary">
            @if ($notification->created_at)
                {{ $notification->created_at->format('Y-m-d') }}
            @endif
        </p>
    </a>
    <!-- Enlace para dispositivos móviles -->
    <a href="#notificationOffcanvas" id="notification-link"
        onclick="showNotificacion({{ $notification->id }});"
        class="{{ $notification->visto != true ? 'unread' : '' }} notification-link d-lg-none"
        data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas"
        aria-controls="notificationOffcanvas" data-notification-id="{{ $notification->id }}">
        <p class="notificacion-title mb-1">{{ $notification->titulo }}
            <span class="badge text-bg-info">{{ $notification->tipo }}</span>
        </p>
        <p class="mb-1">{{ Str::limit($notification->contenido, 50) }}</p>
        <p class="text-body-tertiary">
            @if ($notification->created_at)
                {{ $notification->created_at->format('Y-m-d') }}
            @endif
        </p>
    </a>
@endforeach
