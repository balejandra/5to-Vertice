<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\Participacion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ParticipacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-participacion', ['only' => ['index']]);
        $this->middleware('permission:crear-participacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-participacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-participacion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-participacion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Participacion.
     */
    public function index(): View
    {
        $participaciones = Participacion::all();

        return view('taxonomia.participaciones.index')
            ->with('participaciones', $participaciones);
    }

    /**
     * Show the form for creating a new Participacion.
     */
    public function create(): View
    {
        return view('taxonomia.participaciones.create');
    }

    /**
     * Store a newly created Participacion in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $participacion = Participacion::create($input);

        Flash::success('Participación guardada satisfactoriamente.');

        return redirect(route('participaciones.index'));
    }

    /**
     * Display the specified Participacion.
     */
    public function show(Participacion $participacione)
    {
        $participacion = Participacion::find($participacione->id);

        if (empty($participacion)) {
            Flash::error('Participación no encontrada');

            return redirect(route('participaciones.index'));
        }

        return view('taxonomia.participaciones.show')->with('participacion', $participacion);
    }

    /**
     * Show the form for editing the specified Participacion.
     */
    public function edit(Participacion $participacione)
    {
        $participacion = Participacion::find($participacione->id);

        if (empty($participacion)) {
            Flash::error('Participación no encontrada');

            return redirect(route('participaciones.index'));
        }

        return view('taxonomia.participaciones.edit')->with('participacion', $participacion);
    }

    /**
     * Update the specified Participacion in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $participacion = Participacion::find($id);

        if (empty($participacion)) {
            Flash::error('Participación no encontrada');

            return redirect(route('participaciones.index'));
        }

        $participacion->nombre = $request->input('nombre');
        $participacion->save();

        Flash::success('Participación actualizada satisfactoriamente.');

        return redirect(route('participaciones.index'));
    }

    /**
     * Remove the specified Participacion from storage.
     */
    public function destroy($id)
    {
        $participacion = Participacion::find($id);

        if (empty($participacion)) {
            Flash::error('Participación no encontrada');

            return redirect(route('participaciones.index'));
        }

        $participacion->delete();

        Flash::success('Participación eliminada satisfactoriamente.');

        return redirect(route('participaciones.index'));
    }
}
