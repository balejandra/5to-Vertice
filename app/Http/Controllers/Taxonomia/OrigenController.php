<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\Origen;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class OrigenController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-origen', ['only' => ['index']]);
        $this->middleware('permission:crear-origen', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-origen', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-origen', ['only' => ['show']]);
        $this->middleware('permission:eliminar-origen', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the Origen.
     */
    public function index(): View
    {
        $origen = Origen::all();

        return view('taxonomia.origenes.index')
            ->with('origenes', $origen);
    }

    /**
     * Show the form for creating a new Origen.
     */
    public function create(): View
    {
        return view('taxonomia.origenes.create');
    }

    /**
     * Store a newly created Origen in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $origen = Origen::create($input);

        Flash::success('Origen guardado satisfactoriamente.');

        return redirect(route('origenes.index'));
    }

    /**
     * Display the specified Origen.
     */
    public function show(Origen $origene)
    {
        $origen1 = Origen::find($origene->id);

        if (empty($origen1)) {
            Flash::error('Origen no encontrado');

            return redirect(route('origenes.index'));
        }

        return view('taxonomia.origenes.show')->with('origenes', $origen1);
    }

    /**
     * Show the form for editing the specified Origen.
     */
    public function edit(Origen $origene)
    {
        $origenes = Origen::find($origene->id);

        if (empty($origenes)) {
            Flash::error('Origen no encontrado');

            return redirect(route('origenes.index'));
        }

        return view('taxonomia.origenes.edit')->with('origenes', $origenes);
    }

    /**
     * Update the specified Origen in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $origenes = Origen::find($id);

        if (empty($origenes)) {
            Flash::error('Origen no encontrado');

            return redirect(route('origen.index'));
        }

        $origenes->nombre = $request->input('nombre');
        $origenes->save();

        Flash::success('Origen actualizado satisfactoriamente.');

        return redirect(route('origenes.index'));
    }

    /**
     * Remove the specified Origen from storage.
     */
    public function destroy($id)
    {
        $origenes = Origen::find($id);

        if (empty($origenes)) {
            Flash::error('Origen no encontrado');

            return redirect(route('origenes.index'));
        }

        $origenes->delete($id);

        Flash::success('Origen eliminado satisfactoriamente.');

        return redirect(route('origenes.index'));
    }
}