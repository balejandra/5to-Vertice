<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Super Admin
        $superadmin_permissions=Permission::all();
        Role::findOrFail(1)->permissions()->sync($superadmin_permissions->pluck('id'));

         //Administrador Institucion
        $admin_institucion=$superadmin_permissions->filter(function($permission){
            $name=explode('-', $permission->name);
            if($name[1] == 'usuario' ||  $name[1] == 'institucionpropia'){
                return $permission->name;
            }
        });
        Role::findOrFail(2)->permissions()->sync($admin_institucion->pluck('id'));

        //Autor origen

        $autororigen_permissions=Permission::whereIn('name', [
            'consultar-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'actualizar-proyecto',
            'listar-proyectos-generados',
            'listar-proyectos-origen-autor',
            'listar-notificaciones',
            'consultar-notificaciones',
            ])->get();
        Role::findOrFail(3)->permissions()->sync($autororigen_permissions->pluck('id'));

        //Revisor Origen
        $revisorOrigen=Permission::whereIn('name', [
            'consultar-proyecto',
            'aprobar-proyecto',
            'listar-proyectos-origen-revisor',
            'listar-notificaciones',
            'consultar-notificaciones',
            ])->get();
        Role::findOrFail(4)->permissions()->sync($revisorOrigen->pluck('id'));


        //Aprobador Origen
        $aprobadorOrigen=Permission::whereIn('name', [
            'consultar-proyecto',
            'aprobar-proyecto',
            'listar-proyectos-origen-aprobador',
            'listar-notificaciones',
            'consultar-notificaciones',
            ])->get();
        Role::findOrFail(5)->permissions()->sync($aprobadorOrigen->pluck('id'));

        //Revisor Destino
        $revisorDestino_permissions = Permission::whereIn('name', [
            'consultar-proyecto',
            'listar-proyectos-destino_revisor',
            'consultar-notificaciones',
            'listar-notificaciones',
        ])->get();
        Role::findOrFail(6)->permissions()->sync($revisorDestino_permissions->pluck('id'));

        //Aprobador Destino
        $revisorDestino_permissions=Permission::whereIn('name', [
            'consultar-proyecto',
            'listar-proyectos-destino_aprobador',
            'consultar-notificaciones',
            'listar-notificaciones',
            ])->get();
        Role::findOrFail(7)->permissions()->sync($revisorDestino_permissions->pluck('id'));

           //Usuario Reporte
        $usuario_reporte=Permission::whereIn('name', [
            'consultar-zarpe',
            'busqueda-avanzada',
            'busqueda-simple',
            'listar-busqueda',
            'listar-proyectos-todos'
        ])->get();
        Role::findOrFail(8)->permissions()->sync($usuario_reporte->pluck('id'));
    }
}
