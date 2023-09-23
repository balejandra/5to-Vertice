@extends('layouts.app')
@section('titulo')
    Notificaciones
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">

                <div class="col-lg-5 col-md-12 notifications-list p-0 rounded-start-2">

                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($notificaciones as $notification)
                            <!--  LINK PARA ESCRITORIO  -->
                            <a href="#"
                                class="{{ $notification->visto != true ? 'notification-link-unread' : 'notification-link' }}  d-none d-lg-block"
                                data-notification-id="{{ $notification->id }}">
                                <p class="notificacion-title mb-1 ">{{ $notification->titulo }}
                                    <span class="badge  text-bg-info">{{ $notification->tipo }}</span>
                                </p>
                                <p class="mb-1">{{ Str::limit($notification->contenido, 50) }}</p>
                                <p class="text-body-tertiary">
                                    @if ($notification->created_at)
                                        {{ $notification->created_at->format('Y-m-d') }}
                                    @endif
                                </p>
                            </a>
                            <!--  LINK PARA DISPOSITIVOS MOVILES  -->
                            <a href="#notificationOffcanvas"
                                class="{{ $notification->visto != true ? 'notification-link-unread' : 'notification-link' }} d-lg-none"
                                data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas"
                                aria-controls="notificationOffcanvas" data-notification-id="{{ $notification->id }}">
                                <p class="notificacion-title mb-1">{{ $notification->titulo }}
                                    <span class="badge  text-bg-info">{{ $notification->tipo }}</span>
                                </p>
                                <p class="mb-1">{{ Str::limit($notification->contenido, 50) }}</p>
                                <p class="text-body-tertiary">
                                    @if ($notification->created_at)
                                        {{ $notification->created_at->format('Y-m-d') }}
                                    @endif
                                </p>
                            </a>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-7 col-md-12 p-0 notification-box rounded-end-2"">
                    <div id="notification-content" class="">
                        <!-- Contenido de la notificación se cargará aquí -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offcanvas para mostrar el contenido de la notificación en dispositivos móviles -->
    <div id="notificationOffcanvas" class="offcanvas offcanvas-end" tabindex="-1"
        aria-labelledby="offcanvasResponsiveLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
        </div>
        <div class="offcanvas-body" id="notificationContentBody">
            <!-- Contenido de la notificación se cargará aquí -->
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                // Mostrar el contenido de la notificación en la columna de contenido (escritorio) o en el offcanvas (móvil)
                $('.notification-link').click(function() {
                    var notificationId = $(this).data('notification-id');
                    $.ajax({
                        url: route('notificaciones.show', [notificationId]),
                        method: 'GET',
                        success: function(response) {
                            // Si estamos en dispositivos móviles, muestra el offcanvas
                            if ($(window).width() <= 991) {
                                $('#notificationContentBody').html(response);
                            } else {
                                // Si estamos en escritorio, actualiza la columna de contenido
                                $('#notification-content').html(response);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
