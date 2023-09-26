<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserExtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nombres' => 'User Autor',
            'apellidos' => 'Prueba',
            'email' => 'user_autor@user.com',
            'numero_identificacion' => '11111111',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'), // password
            'remember_token' => Str::random(10),
            'tipo_usuario' => 'Usuario Externo',
            'institucion_id' => 30

        ]);
        $user->assignRole('Autor Origen');

        $user = User::create([
            'nombres' => 'User Revisor',
            'apellidos' => 'Prueba',
            'email' => 'user_revisor@user.com',
            'numero_identificacion' => '22222222',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            // password
            'remember_token' => Str::random(10),
            'tipo_usuario' => 'Usuario Externo',
            'institucion_id' => 30

        ]);
        $user->assignRole('Revisor Origen');

        $user = User::create([
            'nombres' => 'Aprobador Origen',
            'apellidos' => 'Prueba',
            'email' => 'user_aprobador@user.com',
            'numero_identificacion' => '33333333',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            // password
            'remember_token' => Str::random(10),
            'tipo_usuario' => 'Usuario Externo',
            'institucion_id' => 30

        ]);
        $user->assignRole('Aprobador Origen');

        $user = User::create([
            'nombres' => 'User',
            'apellidos' => 'Aprobador Destino',
            'email' => 'user_aprobadorDestino@user.com',
            'numero_identificacion' => '987654321',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            // password
            'remember_token' => Str::random(10),
            'tipo_usuario' => 'Usuario Interno',
            'institucion_id' => 1

        ]);
        $user->assignRole('Aprobador Destino');
    }
}
