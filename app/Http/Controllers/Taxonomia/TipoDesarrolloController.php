<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\TipoDesarrollo;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TipoDesarrolloController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-tipodesarrollo', ['only' => ['index']]);
        $this->middleware('permission:crear-tipodesarrollo', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-tipodesarrollo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-tipodesarrollo', ['only' => ['show']]);
        $this->middleware('permission:eliminar-tipodesarrollo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the TipoDesarrollo.
     */
    public function index(): View
    {
        $tipoDesarrollos = TipoDesarrollo::all();

        return view('taxonomia.tipo_desarrollos.index')
            ->with('tipoDesarrollos', $tipoDesarrollos);
    }

    /**
     * Show the form for creating a new TipoDesarrollo.
     */
    public function create(): View
    {
        return view('taxonomia.tipo_desarrollos.create');
    }

    /**
     * Store a newly created TipoDesarrollo in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $tipoDesarrollo = TipoDesarrollo::create($input);

        Flash::success('Tipo de Desarrollo guardado satisfactoriamente.');

        return redirect(route('tipoDesarrollos.index'));
    }

    /**
     * Display the specified TipoDesarrollo.
     */
    public function show(TipoDesarrollo $tipoDesarrollo)
    {
        $tipoDesarrollo = TipoDesarrollo::find($tipoDesarrollo->id);

        if (empty($tipoDesarrollo)) {
            Flash::error('Tipo de Desarrollo no encontrado');

            return redirect(route('tipoDesarrollos.index'));
        }

        return view('taxonomia.tipo_desarrollos.show')->with('tipoDesarrollo', $tipoDesarrollo);
    }

    /**
     * Show the form for editing the specified TipoDesarrollo.
     */
    public function edit(TipoDesarrollo $tipoDesarrollo)
    {
        $tipoDesarrollo = TipoDesarrollo::find($tipoDesarrollo->id);

        if (empty($tipoDesarrollo)) {
            Flash::error('Tipo de Desarrollo no encontrado');

            return redirect(route('tipoDesarrollos.index'));
        }

        return view('taxonomia.tipo_desarrollos.edit')->with('tipoDesarrollo', $tipoDesarrollo);
    }

    /**
     * Update the specified TipoDesarrollo in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $tipoDesarrollo = TipoDesarrollo::find($id);

        if (empty($tipoDesarrollo)) {
            Flash::error('Tipo de Desarrollo no encontrado');

            return redirect(route('tipoDesarrollos.index'));
        }

        $tipoDesarrollo->nombre = $request->input('nombre');
        $tipoDesarrollo->save();

        Flash::success('Tipo de Desarrollo actualizado satisfactoriamente.');

        return redirect(route('tipoDesarrollos.index'));
    }

    /**
     * Remove the specified TipoDesarrollo from storage.
     */
    public function destroy($id)
    {
        $tipoDesarrollo = TipoDesarrollo::find($id);

        if (empty($tipoDesarrollo)) {
            Flash::error('Tipo de Desarrollo no encontrado');

            return redirect(route('tipoDesarrollos.index'));
        }

        $tipoDesarrollo->delete();

        Flash::success('Tipo de Desarrollo eliminado satisfactoriamente.');

        return redirect(route('tipoDesarrollos.index'));
    }
}
