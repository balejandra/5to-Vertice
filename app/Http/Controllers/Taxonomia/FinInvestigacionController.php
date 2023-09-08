<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\FinInvestigacion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class FinInvestigacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-fininvestigacion', ['only' => ['index']]);
        $this->middleware('permission:crear-fininvestigacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-fininvestigacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-fininvestigacion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-fininvestigacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the FinInvestigacion.
     */
    public function index(): View
    {
        $finInvestigaciones = FinInvestigacion::all();

        return view('taxonomia.fin_investigaciones.index')
            ->with('finInvestigaciones', $finInvestigaciones);
    }

    /**
     * Show the form for creating a new FinInvestigacion.
     */
    public function create(): View
    {
        return view('taxonomia.fin_investigaciones.create');
    }

    /**
     * Store a newly created FinInvestigacion in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $finInvestigacion = FinInvestigacion::create($input);

        Flash::success('Fin de Investigación guardado satisfactoriamente.');

        return redirect(route('finInvestigaciones.index'));
    }

    /**
     * Display the specified FinInvestigacion.
     */
    public function show(FinInvestigacion $finInvestigacione)
    {
        $finInvestigacion = FinInvestigacion::find($finInvestigacione->id);

        if (empty($finInvestigacion)) {
            Flash::error('Fin de Investigación no encontrado');

            return redirect(route('finInvestigaciones.index'));
        }

        return view('taxonomia.fin_investigaciones.show')->with('finInvestigacion', $finInvestigacion);
    }

    /**
     * Show the form for editing the specified FinInvestigacion.
     */
    public function edit(FinInvestigacion $finInvestigacione)
    {
        $finInvestigacion = FinInvestigacion::find($finInvestigacione->id);

        if (empty($finInvestigacion)) {
            Flash::error('Fin de Investigación no encontrado');

            return redirect(route('finInvestigaciones.index'));
        }

        return view('taxonomia.fin_investigaciones.edit')->with('finInvestigacion', $finInvestigacion);
    }

    /**
     * Update the specified FinInvestigacion in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $finInvestigacion = FinInvestigacion::find($id);

        if (empty($finInvestigacion)) {
            Flash::error('Fin de Investigación no encontrado');

            return redirect(route('finInvestigaciones.index'));
        }

        $finInvestigacion->nombre = $request->input('nombre');
        $finInvestigacion->save();

        Flash::success('Fin de Investigación actualizado satisfactoriamente.');

        return redirect(route('finInvestigaciones.index'));
    }

    /**
     * Remove the specified FinInvestigacion from storage.
     */
    public function destroy($id)
    {
        $finInvestigacion = FinInvestigacion::find($id);

        if (empty($finInvestigacion)) {
            Flash::error('Fin de Investigación no encontrado');

            return redirect(route('finInvestigaciones.index'));
        }

        $finInvestigacion->delete();

        Flash::success('Fin de Investigación eliminado satisfactoriamente.');

        return redirect(route('finInvestigaciones.index'));
    }
}
