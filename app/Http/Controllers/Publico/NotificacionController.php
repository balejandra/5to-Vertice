<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-notificaciones', ['only' => ['index']]);
        $this->middleware('permission:consultar-notificaciones', ['only' => ['show']]);
    }

    public function busqueda(Request $request)
    {
        $keyword = $request->input('keyword');

        // Realiza la búsqueda de notificaciones en función del término de búsqueda ($keyword)
        $notificaciones = Notificacion::where('titulo', 'ILIKE', "%$keyword%")
            ->orWhere('contenido', 'ILIKE', "%$keyword%")
            ->get();

        // Devuelve una vista parcial que representa la lista de notificaciones filtradas
        return view('publico.notificaciones.list-search', compact('notificaciones'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $tipo = $request->input('tipo');

        $notificaciones = Notificacion::where('user_id', $user_id)
            ->when($tipo, function ($q) use ($tipo) {
                $q->where('tipo', $tipo);
            })
            ->orderBy('created_at', 'desc')->get();
        $this->statusNotificaciones();

        return view('publico.notificaciones.index')
            ->with('notificaciones', $notificaciones);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(array $data)
    {
        $validator = Validator::make($data, Notificacion::$rules);

        if ($validator->fails()) {
            // Handle the case where validation fails
            return $errors = $validator->errors();
        } else {
            // Validation passed, proceed with saving the data
            $notificacion = new Notificacion($data);
            $notificacion->save();
            return $notificacion;
            // Use $notificacionId as needed
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Notificacion $notificacion)
    {
        // dd($notificacion);
        $notificacion = Notificacion::findOrFail($notificacion->id);
        $this->statusNotificaciones();
        // Marcar la notificación como leída
        if ($notificacion->visto == false) {
            $notificacion->visto = true;
            $notificacion->save();
        }

        return view('publico.notificaciones.show', compact('notificacion'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function statusNotificaciones()
    {
        $userid = auth()->id();
        $notificaciones = Notificacion::where('user_id', $userid)->where('visto', false)->get();
        if (count($notificaciones) > 0) {
            session(['notificaciones' => count($notificaciones)]);
        } else {
            session(['notificaciones' => 0]);
        }
    }
}
