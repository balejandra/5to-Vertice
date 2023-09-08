<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Super Admin',
            'Administrador Institución',
            'Autor Origen',
            'Revisor Origen',
            'Aprobador Origen',
            'Revisor Destino',
            'Aprobador Destino',
            'Usuario Reporte'
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role
            ]);
        }
    }
}