<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Http\Requests\Publico\UpdateUserRequest;
use App\Models\Publico\CapitaniaUser;
use App\Models\Publico\Institucion;
use App\Models\Publico\Menu_rol;
use App\Models\User;
use App\Repositories\Publico\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('permission:listar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:consultar-usuario', ['only' => ['show']]);
        $this->middleware('permission:eliminar-usuario', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the User.
     */
    public function index(Request $request): View
    {
        $users = $this->userRepository->all();

        return view('publico.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     */
    public function create(): View
    {
        $menu = Menu_rol::pluck('role_id');
        $roles = Role::whereIn('id', $menu)->get();
        $roleExcl = Role::whereNotIn('id', $menu)->get();
        $roles = $roles->pluck('name', 'id');
        $instituciones = Institucion::pluck('nombre', 'id');
        return view('publico.users.create')
            ->with('roles', $roles)
            ->with('rolexcl', $roleExcl)
            ->with('instituciones', $instituciones);
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                // 'email' => 'required|string|email:rfc,dns|max:255|unique:users',
                'email' => 'required|string|max:255|unique:users',
                'password' => [
                    'required',
                    'max:50',
                    'confirmed',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->uncompromised(),
                ],
                'institucion_id' => 'required|string'
            ],
            [
                'email.unique' => 'Email ya registrado',
            ]
        );

        $data = new User();
        $data->email = $request->email;
        $data->nombres = $request->nombres;
        $data->apellidos = $request->apellidos;
        $data->password = Hash::make($request->password);
        $data->tipo_usuario = $request->tipo_usuario;
        $data->institucion_id = $request->institucion_id;
        $data->email_verified_at = now();
        $data->save();

        $roles = $request->input('roles', []);
        $data->roles()->sync($roles);

        Flash::success('Usuario guardado exitosamente.');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show(User $user)
    {
        $user1 = $this->userRepository->find($user->id);
        if (empty($user1)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('publico.users.show')->with('user', $user1);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'id');
        $user1 = $this->userRepository->find($user->id);
        $roleUser = $user1->roles;
        $instituciones = Institucion::pluck('nombre', 'id');

        if (empty($user1)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('publico.users.edit')
            ->with('user', $user1)
            ->with('roles', $roles)
            ->with('roleUser', $roleUser)
            ->with('instituciones', $instituciones);
    }

    /**
     * Update the specified User in storage.
     */
    public function update($id, Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            // 'email' => 'required|string|email:rfc,dns|max:255',
            'email' => 'required|string|max:255',
            'institucion_id' => 'required|string'
        ]);


        $user = User::find($id);
        $user->email = $request->email;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        if ($request->password_change) {
            $validated = $request->validate([
                'nombres' => ['required', 'string', 'max:255'],
                // 'email' => ['required', 'string', 'email:rfc,dns', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'password' => [
                    'required',
                    'max:50',
                    'confirmed',
                    Password::min(8)
                        ->mixedCase()
                        ->letters()
                        ->numbers()
                        ->uncompromised(),
                ],
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->tipo_usuario = $request->tipo_usuario;
        $user->institucion_id=$request->institucion_id;
        $user->email_verified_at = now();
        $user->update();
        $roles = $request->roles;
        $user->roles()->sync($roles);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        Flash::success('Usuario actualizado con éxito.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        //     $capitania=CapitaniaUser::where('user_id',$id)->delete();
        $this->userRepository->delete($id);

        Flash::success('Usuario eliminado exitosamente.');

        return redirect(route('users.index'));
    }

    /* public function consulta(Request $request){
         $cedula=$_REQUEST['cedula'];
         $fecha=$_REQUEST['fecha'];
         $newDate = date("d/m/Y", strtotime($fecha));
         $newDate2 = date("d-m-Y", strtotime($fecha));
         $newDate3 = date("Y-m-d", strtotime($fecha));
         $data= Saime_cedula::where('cedula',$cedula)
             ->whereIn('fecha_nacimiento',[$newDate,$newDate2,$newDate3])
             ->get();
         if (is_null($data->first())) {
            // dd('error');
             $data=response()->json([
                 'status'=>3,
                 'msg' => $exception->getMessage(),
                 'errors'=>[],
             ], 200);
         }
             echo json_encode($data);
     }*/


    public function indexUserDeleted(): View
    {
        $users = User::onlyTrashed()->where('tipo_usuario', 'Usuario Interno')->get();

        return view('publico.users.user_delete')
            ->with('users', $users);
    }

    public function restoreUserDeleted($id): RedirectResponse
    {
        $user_deleted = User::where('id', $id);
        $user_deleted->restore();
        Flash::success('Usuario restaurado exitosamente.');

        return redirect(route('userDelete.index'));
    }

    public function searchNombres(Request $request)
    {
        //  dd($request->search);
        $user = User::where('nombres', 'LIKE', '%' . $request->search . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $request->search . '%')->get();
        return \response()->json($user);
    }
}