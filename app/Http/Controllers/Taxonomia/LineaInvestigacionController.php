<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\LineaInvestigacion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class LineaInvestigacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-lineainvestigacion', ['only' => ['index']]);
        $this->middleware('permission:crear-lineainvestigacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-lineainvestigacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-lineainvestigacion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-lineainvestigacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the LineaInvestigacion.
     */
    public function index(): View
    {
        $lineaInvestigaciones = LineaInvestigacion::all();

        return view('taxonomia.linea_investigaciones.index')
            ->with('lineaInvestigaciones', $lineaInvestigaciones);
    }

    /**
     * Show the form for creating a new LineaInvestigacion.
     */
    public function create(): View
    {
        return view('taxonomia.linea_investigaciones.create');
    }

    /**
     * Store a newly created LineaInvestigacion in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $lineaInvestigacion = LineaInvestigacion::create($input);

        Flash::success('Línea de Investigación guardada satisfactoriamente.');

        return redirect(route('lineaInvestigaciones.index'));
    }

    /**
     * Display the specified LineaInvestigacion.
     */
    public function show(LineaInvestigacion $lineaInvestigacion)
    {
        $lineaInvestigacion = LineaInvestigacion::find($lineaInvestigacion->id);

        if (empty($lineaInvestigacion)) {
            Flash::error('Línea de Investigación no encontrada');

            return redirect(route('lineaInvestigaciones.index'));
        }

        return view('taxonomia.linea_investigaciones.show')->with('lineaInvestigacion', $lineaInvestigacion);
    }

    /**
     * Show the form for editing the specified LineaInvestigacion.
     */
    public function edit(LineaInvestigacion $lineaInvestigacion)
    {
        $lineaInvestigacion = LineaInvestigacion::find($lineaInvestigacion->id);

        if (empty($lineaInvestigacion)) {
            Flash::error('Línea de Investigación no encontrada');

            return redirect(route('lineaInvestigaciones.index'));
        }

        return view('taxonomia.linea_investigaciones.edit')->with('lineaInvestigacion', $lineaInvestigacion);
    }

    /**
     * Update the specified LineaInvestigacion in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $lineaInvestigacion = LineaInvestigacion::find($id);

        if (empty($lineaInvestigacion)) {
            Flash::error('Línea de Investigación no encontrada');

            return redirect(route('lineaInvestigaciones.index'));
        }

        $lineaInvestigacion->nombre = $request->input('nombre');
        $lineaInvestigacion->save();

        Flash::success('Línea de Investigación actualizada satisfactoriamente.');

        return redirect(route('lineaInvestigaciones.index'));
    }

    /**
     * Remove the specified LineaInvestigacion from storage.
     */
    public function destroy($id)
    {
        $lineaInvestigacion = LineaInvestigacion::find($id);

        if (empty($lineaInvestigacion)) {
            Flash::error('Línea de Investigación no encontrada');

            return redirect(route('lineaInvestigaciones.index'));
        }

        $lineaInvestigacion->delete();

        Flash::success('Línea de Investigación eliminada satisfactoriamente.');

        return redirect(route('lineaInvestigaciones.index'));
    }
}
