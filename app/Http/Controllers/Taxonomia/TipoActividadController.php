<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\TipoActividad;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TipoActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-tipoactividad', ['only' => ['index']]);
        $this->middleware('permission:crear-tipoactividad', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-tipoactividad', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-tipoactividad', ['only' => ['show']]);
        $this->middleware('permission:eliminar-tipoactividad', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoActividad.
     */
    public function index(): View
    {
        $tipoActividades = TipoActividad::all();

        return view('taxonomia.tipo_actividades.index')
            ->with('tipoActividades', $tipoActividades);
    }

    /**
     * Show the form for creating a new TipoActividad.
     */
    public function create(): View
    {
        return view('taxonomia.tipo_actividades.create');
    }

    /**
     * Store a newly created TipoActividad in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $tipoActividad = TipoActividad::create($input);

        Flash::success('Tipo de Actividad guardado satisfactoriamente.');

        return redirect(route('tipoActividades.index'));
    }

    /**
     * Display the specified TipoActividad.
     */
    public function show(TipoActividad $tipoActividade)
    {
        $tipoActividad = TipoActividad::find($tipoActividade->id);

        if (empty($tipoActividad)) {
            Flash::error('Tipo de Actividad no encontrado');

            return redirect(route('tipoActividades.index'));
        }

        return view('taxonomia.tipo_actividades.show')->with('tipoActividad', $tipoActividad);
    }

    /**
     * Show the form for editing the specified TipoActividad.
     */
    public function edit(TipoActividad $tipoActividade)
    {
        $tipoActividad = TipoActividad::find($tipoActividade->id);

        if (empty($tipoActividad)) {
            Flash::error('Tipo de Actividad no encontrado');

            return redirect(route('tipoActividades.index'));
        }

        return view('taxonomia.tipo_actividades.edit')->with('tipoActividad', $tipoActividad);
    }

    /**
     * Update the specified TipoActividad in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $tipoActividad = TipoActividad::find($id);

        if (empty($tipoActividad)) {
            Flash::error('Tipo de Actividad no encontrado');

            return redirect(route('tipoActividades.index'));
        }

        $tipoActividad->nombre = $request->input('nombre');
        $tipoActividad->save();

        Flash::success('Tipo de Actividad actualizado satisfactoriamente.');

        return redirect(route('tipoActividades.index'));
    }

    /**
     * Remove the specified TipoActividad from storage.
     */
    public function destroy($id)
    {
        $tipoActividad = TipoActividad::find($id);

        if (empty($tipoActividad)) {
            Flash::error('Tipo de Actividad no encontrado');

            return redirect(route('tipoActividades.index'));
        }

        $tipoActividad->delete();

        Flash::success('Tipo de Actividad eliminado satisfactoriamente.');

        return redirect(route('tipoActividades.index'));
    }
}
