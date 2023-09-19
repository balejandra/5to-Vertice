<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Models\Publico\Menu;
use App\Models\Publico\Menu_rol;
use App\Repositories\Publico\MenuRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    /** @var  MenuRepository */
    private $menuRepository;
    private $titulo = "Menús";
    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;

        $this->middleware('permission:listar-menu', ['only' => ['index']]);
        $this->middleware('permission:crear-menu', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-menu', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-menu', ['only' => ['show']]);
        $this->middleware('permission:eliminar-menu', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Menu.
     */
    public function index(Request $request): View
    {
        $menuspadre = Menu::where('parent', 0)->get();
        $menushijos = Menu::where('parent', '<>', 0)->get();
        $parent = Menu::pluck('name', 'id')->toArray();
        return view('publico.menus.index')
            ->with('menushijos', $menushijos)
            ->with('menuspadre', $menuspadre)
            ->with('parent', $parent)
            ->with('titulo', $this->titulo);
    }


    /**
     * Show the form for creating a new Menu.
     */
    public function create(): View
    {
        $parents = Menu::where('enabled', 1)->orderBy('id')->get();
        $noparent = ['0' => 'Menu Padre'];
        $parents2 = $parents->pluck('name', 'id', 'description')->toArray();
        $parent = $noparent + $parents2;

        $menuRols = Role::selectRaw(" roles.*, '' as checked")->get();

        return view('publico.menus.create')
            ->with('roles', $menuRols)
            ->with('parent', $parent)
            ->with('titulo', $this->titulo);
    }

    /**
     * Store a newly created Menu in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:menus|max:255',
                'url' => 'required|max:255',
                'parent' => 'required|max:255',
                'enabled' => 'required|max:255',
                'role' => 'required',
                'order' => 'required'
            ],
            [
                'name.unique' => 'Menú ya registrado',
                'name.required' => 'El campo Nombre es obligatorio',
                'order.required' => 'El campo Orden es obligatorio',
                'parent.required' => 'El campo Menu Padre es obligatorio',
                'role.required' => 'Es obligatorio asignar un rol al Menú'

            ]
        );

        $menu = Menu::create($request->except(['role']));
        $roles = $menu->roles()->sync($request['role']);

        Flash::success('Menú guardado con éxito.');
        return redirect()->route('menus.index')->with('titulo', $this->titulo);
    }

    /**
     * Display the specified Menu.
     */
    public function show(Menu $menu)
    {
        $id = $menu->id;
        $menu = $this->menuRepository->find($menu->id);

        $parents = Menu::where('enabled', 1)->orderBy('id')->get();
        $noparent = ['0' => 'Menu Padre'];
        $parents2 = $parents->pluck('name', 'id', 'description')->toArray();
        $parent = $noparent + $parents2;

        $menuRols = Role::selectRaw(" roles.name as name, roles.id as id,menus_roles.menu_id, menus_roles.role_id,(CASE WHEN menus_roles.role_id = roles.id THEN 'checked' ELSE '' END) AS
        checked")
            ->leftJoin('menus_roles', function ($join) use ($id) {
                $join->on('roles.id', '=', 'menus_roles.role_id')
                    ->where('menus_roles.menu_id', '=', $id);
            })
            ->get();
        if (empty($menu)) {
            Flash::success('Menú no encontrado.');
            return redirect()->route('menus.index');
        }

        return view('publico.menus.show')
            ->with('menu', $menu)
            ->with('parent', $parent)
            ->with('menuRols', $menuRols)
            ->with('titulo', $this->titulo);
    }

    /**
     * Show the form for editing the specified Menu.
     */
    public function edit(Menu $menu)
    {
        $id = $menu->id;
        $parents = Menu::where('enabled', 1)->orderBy('id')->get();
        $noparent = ['0' => 'Menu Padre'];
        $parents2 = $parents->pluck('name', 'id')->toArray();
        $parent = $noparent + $parents2;

        $menu = $this->menuRepository->find($menu->id);

        if (empty($menu)) {
            Flash::error('Menú no encontrado');
            return redirect()->route('menus.index');
        }

        $menuRols = Role::selectRaw(" roles.name as name, roles.id as id,menus_roles.menu_id, menus_roles.role_id,(CASE WHEN menus_roles.role_id = roles.id THEN 'checked' ELSE '' END) AS
        checked")
            ->leftJoin('menus_roles', function ($join) use ($id) {
                $join->on('roles.id', '=', 'menus_roles.role_id')
                    ->where('menus_roles.menu_id', '=', $id);
            })
            ->get();

        return view('publico.menus.edit')
            ->with('menu', $menu)
            ->with('parent', $parent)
            ->with('roles', $menuRols)
            ->with('titulo', $this->titulo);
    }

    /**
     * Update the specified Menu in storage.
     */
    public function update($id, Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'max:255', Rule::unique('menus')->ignore($id)],
                'url' => 'required|max:255',
                'parent' => 'required|max:255',
                'role' => 'required',
                'enabled' => 'boolean',
                'order' => 'required'
            ],
            [
                'name.unique' => 'Menú ya registrado',
                'name.required' => 'El campo Nombre es obligatorio',
                'order.required' => 'El campo Orden es obligatorio',
                'parent.required' => 'El campo Menu Padre es obligatorio',
                'role.required' => 'Es obligatorio asignar un rol al Menú'

            ]
        );
        $menu = $this->menuRepository->find($id);

        if (empty($menu)) {
            Flash::error('Menú no encontrado');
            return redirect()->route('menus.index');
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'url' => $request->url,
            'parent' => $request->parent,
            'enabled' => $request->has('enabled') ? true : false,
            'icono' => $request->icono,
            'order' => $request->order,
        ];
        $menu = $this->menuRepository->update($data, $id);
        $role = new Menu();
        $roles1 = $request['role'];
        $roles = $menu->roles()->sync($request['role']);

        Flash::success('Menú actualizado correctamente.');
        return redirect()->route('menus.index')
            ->with('titulo', $this->titulo);
    }

    /**
     * Remove the specified Menu from storage.
     */
    public function destroy($id)
    {
        $menu = $this->menuRepository->find($id);
        if (empty($menu)) {
            Flash::error('Menú no encontrado');
            return redirect()->route('menus.index')->with('titulo', $this->titulo);
        }

        $this->menuRepository->delete($id);
        $parents = Menu_rol::where('menu_id', $id)->delete();

        Flash::success('Menú eliminado con éxito.');
        return redirect()->route('menus.index')->with('titulo', $this->titulo);
    }

    public function indexMenuDeleted(): View
    {
        $menus = Menu::onlyTrashed()->get();
        return view('publico.menus.menu_delete')
            ->with('menus', $menus)
            ->with('titulo', $this->titulo);
    }

    public function restoreMenuDeleted($id): RedirectResponse
    {
        $user_deleted = Menu::where('id', $id);
        $user_deleted->restore();
        Flash::success('Menú restaurado exitosamente.');
        return redirect(route('menuDelete.index'));
    }
}