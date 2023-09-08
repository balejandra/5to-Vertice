<?php

namespace App\Http\Controllers\Taxonomia;

use App\Http\Controllers\Controller;
use App\Models\Taxonomia\Funcion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class FuncionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:listar-funcion', ['only' => ['index']]);
        $this->middleware('permission:crear-funcion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-funcion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-funcion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-funcion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Funcion.
     */
    public function index(): View
    {
        $funciones = Funcion::all();

        return view('taxonomia.funciones.index')
            ->with('funciones', $funciones);
    }

    /**
     * Show the form for creating a new Funcion.
     */
    public function create(): View
    {
        return view('taxonomia.funciones.create');
    }

    /**
     * Store a newly created Funcion in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $input = $request->all();

        $funcion = Funcion::create($input);

        Flash::success('Función guardada satisfactoriamente.');

        return redirect(route('funciones.index'));
    }

    /**
     * Display the specified Funcion.
     */
    public function show(Funcion $funcione)
    {
        $funcion = Funcion::find($funcione->id);

        if (empty($funcion)) {
            Flash::error('Función no encontrada');

            return redirect(route('funciones.index'));
        }

        return view('taxonomia.funciones.show')->with('funcion', $funcion);
    }

    /**
     * Show the form for editing the specified Funcion.
     */
    public function edit(Funcion $funcione)
    {
        $funcion = Funcion::find($funcione->id);

        if (empty($funcion)) {
            Flash::error('Función no encontrada');

            return redirect(route('funciones.index'));
        }

        return view('taxonomia.funciones.edit')->with('funcion', $funcion);
    }

    /**
     * Update the specified Funcion in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:255'
        ]);
        $funcion = Funcion::find($id);

        if (empty($funcion)) {
            Flash::error('Función no encontrada');

            return redirect(route('funciones.index'));
        }

        $funcion->nombre = $request->input('nombre');
        $funcion->save();

        Flash::success('Función actualizada satisfactoriamente.');

        return redirect(route('funciones.index'));
    }

    /**
     * Remove the specified Funcion from storage.
     */
    public function destroy($id)
    {
        $funcion = Funcion::find($id);

        if (empty($funcion)) {
            Flash::error('Función no encontrada');

            return redirect(route('funciones.index'));
        }

        $funcion->delete();

        Flash::success('Función eliminada satisfactoriamente.');

        return redirect(route('funciones.index'));
    }
}
