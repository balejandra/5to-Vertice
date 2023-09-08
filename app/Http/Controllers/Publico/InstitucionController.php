<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\Institucion;
use App\Models\Publico\Sector;
use App\Repositories\Publico\InstitucionRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class InstitucionController extends Controller
{

    private $institucionRepository;

    public function __construct(InstitucionRepository $institucionRepo)
    {
        $this->institucionRepository = $institucionRepo;

        $this->middleware('permission:listar-institucion', ['only' => ['index']]);
        $this->middleware('permission:crear-institucion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-institucion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-institucion', ['only' => ['show']]);
        $this->middleware('permission:eliminar-institucion', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the institucion.
     */
    public function index(Request $request): View
    {
        $instituciones = $this->institucionRepository->all();

        return view('publico.instituciones.index')
            ->with('instituciones', $instituciones);
    }

    /**
     * Show the form for creating a new Institucion.
     */
    public function create(): View
    {
        $sectores = Sector::pluck('nombre', 'id');
        return view('publico.instituciones.create')->with('sectores', $sectores);
    }

    /**
     * Store a newly created Institucion in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nombre' => 'required|string',
                'sigla' => 'required|string',
                'sector_id' => 'required|string',

            ],

            [
                'nombre.required' => 'El campo Nombre es obligatorio',
                'sigla.required' => 'El campo Sigla es obligatorio',
                'sector_id.required' => 'El campo Sector es obligatorio',
            ]
        );

        $input = $request->all();

        $Institucion = $this->institucionRepository->create($input);

        Flash::success('Capitanía guardado con éxito.');

        return redirect(route('instituciones.index'))->with('success', 'Capitanía guardado con éxito.');
    }

    /**
     * Display the specified Institucion.
     */
    public function show(Institucion $institucione)
    {
        // dd($institucione->id);
        $institucion1 = $this->institucionRepository->find($institucione->id);

        if (empty($institucion1)) {
            Flash::error('Institución no encontrada');

            return redirect(route('instituciones.index'));
        }

        return view('publico.instituciones.show')
            ->with('institucion', $institucion1);
    }

    /**
     * Show the form for editing the specified Institucion.
     */
    public function edit(Institucion $institucione)
    {
        $Institucion = $this->institucionRepository->find($institucione->id);
        $sectores = Sector::pluck('nombre', 'id');

        if (empty($Institucion)) {
            Flash::error('Institucion no encontrada');

            return redirect(route('instituciones.index'));
        }

        return view('publico.instituciones.edit')
            ->with('institucion', $Institucion)
            ->with('sectores',$sectores);
    }

    /**
     * Update the specified Institucion in storage.
     */
    public function update($id, Request $request, Institucion $cap)
    {
        $validated = $request->validate(
            [
                'nombre' => 'required|string',
                'sigla' => 'required|string',
            ],

            [
                'nombre.required' => 'El campo Nombre es obligatorio',
                'sigla.required' => 'El campo Sigla es obligatorio',
            ]
        );
        $capi = $this->institucionRepository->update($request->all(), $id);

        Flash::success('Capitanía modificada con éxito.');
        return redirect(route('instituciones.index'));

    }

    /**
     * Remove the specified Institucion from storage.
     */
    public function destroy($id, Institucion $cap)
    {
        $Institucion = $this->institucionRepository->find($id);

        if (empty($Institucion)) {
            Flash::error('Institucion no encontrada');

            return redirect(route('instituciones.index'));
        }

        $this->institucionRepository->delete($id);
        Flash::success('Institucion eliminada con éxito.');

        return redirect(route('instituciones.index'));
    }

    public function indexInstitucionDeleted(): View
    {
        $instituciones = Institucion::onlyTrashed()->get();

        return view('publico.instituciones.deleted')
            ->with('instituciones', $instituciones);
    }

    public function restoreInstitucionDeleted($id): RedirectResponse
    {
        $institucion_deleted = Institucion::where('id', $id);
        $institucion_deleted->restore();
        Flash::success('Institución restaurado exitosamente.');

        return redirect(route('institucionDeleted.index'));
    }
}