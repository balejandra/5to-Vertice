<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\Estatus;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class EstatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-estatus', ['only' => ['index']]);
        $this->middleware('permission:crear-estatus', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-estatus', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-estatus', ['only' => ['show']]);
        $this->middleware('permission:eliminar-estatus', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the Status.
     */
    public function index():View
    {
        $statuses = Estatus::all();

        return view('publico.estatus.index')
            ->with('statuses', $statuses);
    }

    /**
     * Show the form for creating a new Status.
     */
    public function create():View
    {
        return view('publico.estatus.create');
    }

    /**
     * Store a newly created Status in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $status = Estatus::create($input);

        Flash::success('Estatus guardado satisfactoriamente.');

        return redirect(route('estatus.index'));
    }

    /**
     * Display the specified Status.
     */
    public function show(Estatus $estatus)
    {
        $status = Estatus::find($estatus->id);

        if (empty($status)) {
            Flash::error('Estatus no encontrado');

            return redirect(route('estatus.index'));
        }

        return view('publico.estatus.show')->with('status', $status);
    }

    /**
     * Show the form for editing the specified Status.
     */
    public function edit(Estatus $estatus)
    {
        $status = Estatus::find($estatus->id);

        if (empty($status)) {
            Flash::error('Estatus no encontrado');

            return redirect(route('estatus.index'));
        }

        return view('publico.estatus.edit')->with('status', $status);
    }

    /**
     * Update the specified Status in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $status = Estatus::find($id);

        if (empty($status)) {
            Flash::error('Estatus no encontrado');

            return redirect(route('estatus.index'));
        }

        $status->nombre = $request->input('nombre');
        $status->save();

        Flash::success('Estatus actualizado satisfactoriamente.');

        return redirect(route('estatus.index'));
    }

    /**
     * Remove the specified Status from storage.
     */
    public function destroy($id)
    {
        $status = Estatus::find($id);

        if (empty($status)) {
            Flash::error('Estatus no encontrado');

            return redirect(route('estatus.index'));
        }

        $status->delete($id);

        Flash::success('Estatus eliminado satisfactoriamente.');

        return redirect(route('estatus.index'));
    }
}