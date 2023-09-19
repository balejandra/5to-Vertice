<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\PermissionOwn;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;


class PermissionController extends Controller
{
    public function __construct()
    {

        $this->middleware('permission:listar-permiso', ['only' => ['index']]);
        $this->middleware('permission:crear-permiso', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-permiso', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-permiso', ['only' => ['show']]);
        $this->middleware('permission:eliminar-permiso', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $permissions = PermissionOwn::orderBy('id', 'DESC')->get();

        return view('publico.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('publico.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:permissions|max:255',
            ],
            [
                'name.unique' => 'Permiso ya registrado',
                'name.required' => 'El campo Nombre es obligatorio',
            ]
        );

        ($permission = new PermissionOwn($request->input()))->saveOrFail();
        Flash::success('Permiso guardado satisfactoriamente.');

        return redirect(route('permissions.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PermissionOwn $permission):View
    {
        return view('publico.permissions.edit', compact('permission'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'max:255', Rule::unique('permissions')->ignore($id)],
            ],
            [
                'name.required' => 'El campo Nombre es obligatorio',

            ]
        );

        $permission = PermissionOwn::findOrFail($id);
        $permission->name = $request->input('name');
        $permission->save();
        Flash::success('Permiso actualizado satisfactoriamente.');
        return redirect(route('permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $permission = PermissionOwn::findOrFail($id);
        $permission->delete();
        Flash::success('Permiso eliminado satisfactoriamente.');

        return back();
    }

    public function indexPermissionDeleted(): View
    {
        $permission = PermissionOwn::onlyTrashed()->get();

        return view('publico.permissions.permission_delete')
            ->with('permissions', $permission);
    }

    public function restorePermissionDeleted($id):RedirectResponse
    {
        $permission_deleted = PermissionOwn::where('id', $id);
        $permission_deleted->restore();
        Flash::success('Permiso restaurado exitosamente.');

        return redirect(route('permissionDelete.index'));
    }
}