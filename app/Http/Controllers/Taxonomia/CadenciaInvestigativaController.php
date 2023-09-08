<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\CadenciaInvestigativa;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CadenciaInvestigativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-cadenciainvestigativa', ['only' => ['index']]);
        $this->middleware('permission:crear-cadenciainvestigativa', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-cadenciainvestigativa', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-cadenciainvestigativa', ['only' => ['show']]);
        $this->middleware('permission:eliminar-cadenciainvestigativa', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the CadenciaInvestigativa.
     */
    public function index(): View
    {
        $cadenciaInvestigativas = CadenciaInvestigativa::all();

        return view('taxonomia.cadencia_investigativas.index')
            ->with('cadenciaInvestigativas', $cadenciaInvestigativas);
    }

    /**
     * Show the form for creating a new CadenciaInvestigativa.
     */
    public function create(): View
    {
        return view('taxonomia.cadencia_investigativas.create');
    }

    /**
     * Store a newly created CadenciaInvestigativa in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $cadenciaInvestigativa = CadenciaInvestigativa::create($input);

        Flash::success('Cadencia Investigativa guardada satisfactoriamente.');

        return redirect(route('cadenciaInvestigativas.index'));
    }

    /**
     * Display the specified CadenciaInvestigativa.
     */
    public function show(CadenciaInvestigativa $cadenciaInvestigativa)
    {
        $cadenciaInvestigativa = CadenciaInvestigativa::find($cadenciaInvestigativa->id);

        if (empty($cadenciaInvestigativa)) {
            Flash::error('Cadencia Investigativa no encontrada');

            return redirect(route('cadenciaInvestigativas.index'));
        }

        return view('taxonomia.cadencia_investigativas.show')->with('cadenciaInvestigativa', $cadenciaInvestigativa);
    }

    /**
     * Show the form for editing the specified CadenciaInvestigativa.
     */
    public function edit(CadenciaInvestigativa $cadenciaInvestigativa)
    {
        $cadenciaInvestigativa = CadenciaInvestigativa::find($cadenciaInvestigativa->id);

        if (empty($cadenciaInvestigativa)) {
            Flash::error('Cadencia Investigativa no encontrada');

            return redirect(route('cadenciaInvestigativas.index'));
        }

        return view('taxonomia.cadencia_investigativas.edit')->with('cadenciaInvestigativa', $cadenciaInvestigativa);
    }

    /**
     * Update the specified CadenciaInvestigativa in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $cadenciaInvestigativa = CadenciaInvestigativa::find($id);

        if (empty($cadenciaInvestigativa)) {
            Flash::error('Cadencia Investigativa no encontrada');

            return redirect(route('cadenciaInvestigativa.index'));
        }

        $cadenciaInvestigativa->nombre = $request->input('nombre');
        $cadenciaInvestigativa->save();

        Flash::success('Cadencia Investigativa actualizada satisfactoriamente.');

        return redirect(route('cadenciaInvestigativas.index'));
    }

    /**
     * Remove the specified CadenciaInvestigativa from storage.
     */
    public function destroy($id)
    {
        $cadenciaInvestigativa = CadenciaInvestigativa::find($id);

        if (empty($cadenciaInvestigativa)) {
            Flash::error('Cadencia Investigativa no encontrada');

            return redirect(route('cadenciaInvestigativas.index'));
        }

        $cadenciaInvestigativa->delete();

        Flash::success('Cadencia Investigativa eliminada satisfactoriamente.');

        return redirect(route('cadenciaInvestigativas.index'));
    }
}
