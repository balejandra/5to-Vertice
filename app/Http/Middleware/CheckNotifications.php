<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Publico\Notificacion;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckNotifications
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Consultar las notificaciones no leídas del usuario
            $unreadNotifications = Notificacion::where('user_id', $userId)
                ->where('visto', false)
                ->count();

            $unreadNotificationsProyectos = Notificacion::where('user_id', $userId)
            ->where('visto', false)
            ->where('tipo', 'Proyectos')
            ->count();

            $unreadNotificationsGeneral = Notificacion::where('user_id', $userId)
            ->where('visto', false)
                ->where('tipo', 'General')
            ->count();

            // Actualizar la variable de sesión con la cantidad de notificaciones no leídas
            session(['notificaciones' => $unreadNotifications]);
            session(['notificacionesProyecto' => $unreadNotificationsProyectos]);
            session(['notificacionesGeneral' => $unreadNotificationsGeneral]);
        }

        return $next($request);
    }
}
