<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'numero_identificacion' => ['required', 'string', 'max:20', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'nombres' => ['required', 'string', 'max:255'],
                'apellidos' => ['string', 'max:255'],
                'telefono' => ['required', 'string', 'max:20'],
                'tipo_usuario' => ['string', 'max:20'],
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

            ],
            [
                'email.unique' => 'Email registrado',
                'numero_identificacion.unique' => 'Numero de identificación registrado',
            ]
        );


        $user = User::create([
            'numero_identificacion' => $request['numero_identificacion'],
            'email' => $request['email'],
            'nombres' => $request['nombres'],
            'apellidos' => $request['apellidos'],
            'telefono' => $request['telefono'],
            'tipo_usuario' => 'Usuario Web',
            'password' => Hash::make($request->password),
        ]);

        $role = Role::where('id', 3)->first();
        $user->roles()->sync($role->id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}