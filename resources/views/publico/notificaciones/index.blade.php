@extends('layouts.app')
@section('titulo')
    Notificaciones
@endsection
@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row pb-3 pt-3">
                <div class="col-md-auto p-0">
                    <div class="input-group">
                        <input type="text" id="search" class="form-control" placeholder="Buscar..."
                            onkeyup="filterNotifications()">
                        <span class="input-group-text"> <i class="fa fa-search"></i></span>
                    </div>

                </div>
                <br>
            </div>
            <div class="row">

                <div class="col-lg-5 col-md-12 notifications-list p-0 rounded-start-2">

                    <div class="list-group" id="list-tab" role="tablist">
                        @foreach ($notificaciones as $notification)
                            <!--  LINK PARA ESCRITORIO  -->
                            <a href="#" id="notification-link" onclick="showNotificacion({{ $notification->id }});"
                                class="{{ $notification->visto != true ? 'unread' : '' }} notification-link d-none d-lg-block "
                                data-notification-id="{{ $notification->id }}">
                                <p class="notificacion-title mb-1 ">{{ $notification->titulo }}
                                    <span class="badge  text-bg-info">{{ $notification->tipo }}</span>
                                </p>
                                <p class="mb-1 contenido-notification">{{ Str::limit($notification->contenido, 45) }}</p>
                                <p class="text-body-tertiary date-notification">
                                    @if ($notification->created_at)
                                        {{ $notification->created_at->format('d-m-Y') }}
                                    @endif
                                </p>
                            </a>
                            <!--  LINK PARA DISPOSITIVOS MOVILES  -->
                            <a href="#notificationOffcanvas" id="notification-link"
                                onclick="showNotificacion({{ $notification->id }});"
                                class="{{ $notification->visto != true ? 'unread' : '' }} notification-link d-lg-none"
                                data-bs-toggle="offcanvas" data-bs-target="#notificationOffcanvas"
                                aria-controls="notificationOffcanvas" data-notification-id="{{ $notification->id }}">
                                <p class="notificacion-title mb-1">{{ $notification->titulo }}
                                    <span class="badge text-bg-info">{{ $notification->tipo }}</span>
                                </p>
                                <p class="mb-1 contenido-notification">{{ Str::limit($notification->contenido, 50) }}</p>
                                <p class="text-body-tertiary date-notification">
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
            function filterNotifications() {
                var searchKeyword = $('#search').val();

                $.ajax({
                    url: route('notificaciones.filter'),
                    type: "GET",
                    data: {
                        keyword: searchKeyword
                    },
                    success: function(response) {
                        // Actualiza la lista de notificaciones con los resultados de la búsqueda
                        $('#list-tab').html(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }

            function showNotificacion(id) {
                $('.notification-link').removeClass('notification-selected');
                $.ajax({
                    url: route('notificaciones.show', [id]),
                    type: "GET",
                    success: function(response) {

                        // Si estamos en dispositivos móviles, muestra el offcanvas
                        if ($(window).width() <= 991) {
                            $('#notificationContentBody').html(response);
                        } else {
                            // Si estamos en escritorio, actualiza la columna de contenido
                            $('#notification-content').html(response);
                        }
                        $('[data-notification-id="' + id + '"]').addClass('notification-selected');

                        $('[data-notification-id="' + id + '"]').removeClass('unread');

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        </script>
    @endpush
@endsection
