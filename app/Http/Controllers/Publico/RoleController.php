<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\PermissionOwn;
use App\Models\Publico\RoleOwn;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function __construct()
    {

        $this->middleware('permission:listar-rol', ['only' => ['index']]);
        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-rol', ['only' => ['show']]);
        $this->middleware('permission:eliminar-rol', ['only' => ['destroy']]);

    }

    public function index(): View
    {
        $roles = RoleOwn::all();
        return view('publico.roles.index', compact("roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): View
    {
        $permissions = PermissionOwn::all()->pluck('name', 'id');
        return view('publico.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:roles|max:255',
                'permissions' => 'required'
            ],
            [
                'name.unique' => 'Rol ya registrado',
                'permissions.required' => 'Es obligatorio asignar queriePermisoController al Rol'

            ]
        );

        $role = RoleOwn::create($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));
        Flash::success('Rol creado satisfactoriamente.');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(RoleOwn $role): View
    {
        return view('publico.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoleOwn $role): View
    {
        $permissions = PermissionOwn::all()->pluck('name', 'id');
        $role->load('permissions');
        return view('publico.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RoleOwn $role): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'max:255', Rule::unique('roles')->ignore($role['id'])],
                'permissions' => 'required'
            ],
            [
                'name.unique' => 'Rol ya registrado',
                'permissions.required' => 'Es obligatorio asignar queriePermisoController al Rol'

            ]
        );

        $role->update($request->only('name'));
        $role->permissions()->sync($request->input('permissions', []));

        Flash::success('Rol actualizado satisfactoriamente.');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $role = RoleOwn::findOrFail($id);
        $role->delete();
        Flash::success('Rol eliminado satisfactoriamente.');
        return redirect()->route('roles.index');
    }

    public function indexRolesDeleted(): View
    {
        $role = RoleOwn::onlyTrashed()->get();
        return view('publico.roles.rolesDeleted')
            ->with('roles', $role);
    }

    /**
     * Restored the specified resource from garbage.
     */
    public function restoreRoleDeleted($id): RedirectResponse
    {
        $role_deleted = RoleOwn::where('id', $id);
        $role_deleted->restore();
        Flash::success('Rol restaurado exitosamente.');

        return redirect(route('rolesDeleted.index'));
    }
}