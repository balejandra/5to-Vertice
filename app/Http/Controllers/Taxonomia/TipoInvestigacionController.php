<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\TipoInvestigacion; // Importa el modelo desde la ubicación correcta
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TipoInvestigacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-tipoinvestigacion', ['only' => ['index']]);
        $this->middleware('permission:crear-tipoinvestigacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-tipoinvestigacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-tipoinvestigacion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-tipoinvestigacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoInvestigacion.
     */
    public function index(): View
    {
        $tipoInvestigaciones = TipoInvestigacion::all();

        return view('taxonomia.tipoinvestigaciones.index')
            ->with('tipoInvestigaciones', $tipoInvestigaciones);
    }

    /**
     * Show the form for creating a new TipoInvestigacion.
     */
    public function create(): View
    {
        return view('taxonomia.tipoinvestigaciones.create');
    }

    /**
     * Store a newly created TipoInvestigacion in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $tipoInvestigacion = TipoInvestigacion::create($input);

        Flash::success('Tipo de Investigación guardado satisfactoriamente.');

        return redirect(route('tipoInvestigaciones.index'));
    }

    /**
     * Display the specified TipoInvestigacion.
     */
    public function show(TipoInvestigacion $tipoInvestigacione)
    {
        $tipoInvestigacion = TipoInvestigacion::find($tipoInvestigacione->id);

        if (empty($tipoInvestigacion)) {
            Flash::error('Tipo de Investigación no encontrado');

            return redirect(route('tipoInvestigaciones.index'));
        }

        return view('taxonomia.tipoinvestigaciones.show')->with('tipoInvestigacion', $tipoInvestigacion);
    }

    /**
     * Show the form for editing the specified TipoInvestigacion.
     */
    public function edit(TipoInvestigacion $tipoInvestigacione)
    {
        $tipoInvestigacion = TipoInvestigacion::find($tipoInvestigacione->id);

        if (empty($tipoInvestigacion)) {
            Flash::error('Tipo de Investigación no encontrado');

            return redirect(route('tipoInvestigaciones.index'));
        }

        return view('taxonomia.tipoinvestigaciones.edit')->with('tipoInvestigacion', $tipoInvestigacion);
    }

    /**
     * Update the specified TipoInvestigacion in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $tipoInvestigacion = TipoInvestigacion::find($id);

        if (empty($tipoInvestigacion)) {
            Flash::error('Tipo de Investigación no encontrado');

            return redirect(route('tipoInvestigaciones.index'));
        }

        $tipoInvestigacion->nombre = $request->input('nombre');
        $tipoInvestigacion->save();

        Flash::success('Tipo de Investigación actualizado satisfactoriamente.');

        return redirect(route('tipoInvestigaciones.index'));
    }

    /**
     * Remove the specified TipoInvestigacion from storage.
     */
    public function destroy($id)
    {
        $tipoInvestigacion = TipoInvestigacion::find($id);

        if (empty($tipoInvestigacion)) {
            Flash::error('Tipo de Investigación no encontrado');

            return redirect(route('tipoInvestigaciones.index'));
        }

        $tipoInvestigacion->delete();

        Flash::success('Tipo de Investigación eliminado satisfactoriamente.');

        return redirect(route('tipoInvestigaciones.index'));
    }
}
