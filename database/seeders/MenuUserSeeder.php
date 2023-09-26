<?php

namespace Database\Seeders;

use App\Models\Publico\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /////CONFIG/////////
        $menuConfig = Menu::create([
            'name' => 'Configuración',
            'url' => '/',
            'order' => '0',
            'parent' => '0',
            'icono' => 'fas fa-cog',
        ]);


        $menu2 = Menu::create([
            'name' => 'Menús',
            'url' => 'menus',
            'order' => '2',
            'parent' => $menuConfig['id'],
            'icono' => 'fas fa-bars',
        ]);


        $permiso = Menu::create([
            'name' => 'Permisos',
            'url' => 'permissions',
            'order' => '0',
            'parent' => $menuConfig['id'],
            'icono' => 'fa fa-address-card',
        ]);


        $roles = Menu::create([
            'name' => 'Roles',
            'url' => 'roles',
            'order' => '1',
            'parent' => $menuConfig['id'],
            'icono' => 'fa fa-id-badge',
        ]);


        $auditoria = Menu::create([
            'name' => 'Auditorías',
            'url' => 'auditables',
            'order' => '3',
            'parent' => $menuConfig['id'],
            'icono' => 'fas fa-history',
        ]);


        //Estatus
        $estatus = Menu::create([
            'name' => 'Estatus',
            'url' => 'estatus',
            'order' => '5',
            'parent' => $menuConfig['id'],
            'icono' => 'fa fa-clipboard-check fa-lg',
            'enabled' => true
        ]);

        $menuRols = [
            array('role_id' => '1', 'menu_id' => $menuConfig['id']),
            array('role_id' => '1', 'menu_id' => $permiso['id']),
            array('role_id' => '1', 'menu_id' => $roles['id']),
            array('role_id' => '1', 'menu_id' => $menu2['id']),
            array('role_id' => '1', 'menu_id' => $auditoria['id']),
            array('role_id' => '1', 'menu_id' => $estatus['id']),
        ];
        DB::table('menus_roles')->insert($menuRols);

        /////TAXONOMIA/////////
        $menutax = Menu::create([
            'name' => 'Taxonomía',
            'url' => '/',
            'order' => '1',
            'parent' => '0',
            'icono' => 'fa fa-network-wired',
        ]);


        $origen = Menu::create([
            'name' => 'Origen',
            'url' => 'origenes',
            'order' => '0',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);


        $funciones = Menu::create([
            'name' => 'Función',
            'url' => 'funciones',
            'order' => '1',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);


        $tipoInvestigacion = Menu::create([
            'name' => 'Tipo Investigación',
            'url' => 'tipoInvestigaciones',
            'order' => '2',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);


        $participaciones = Menu::create([
            'name' => 'Participación',
            'url' => 'participaciones',
            'order' => '3',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);


        $cadencia = Menu::create([
            'name' => 'Cadencia Investigativa',
            'url' => 'cadenciaInvestigativas',
            'order' => '4',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);

        $tipoDesarrollo = Menu::create([
            'name' => 'Tipo Desarrollo',
            'url' => 'tipoDesarrollos',
            'order' => '5',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);

        $finInvestigaciones = Menu::create([
            'name' => 'Fin Investigación',
            'url' => 'finInvestigaciones',
            'order' => '6',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);

        $tipoActividad = Menu::create([
            'name' => 'Tipo Actividad',
            'url' => 'tipoActividades',
            'order' => '7',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);

        $lineaInvestigaciones = Menu::create([
            'name' => 'Línea Investigación',
            'url' => 'lineaInvestigaciones',
            'order' => '8',
            'parent' => $menutax['id'],
            'icono' => 'fa fa-check',
        ]);

        $menutaxonomia = [
            array('role_id' => '1', 'menu_id' => $menutax['id']),
            array('role_id' => '1', 'menu_id' => $origen['id']),
            array('role_id' => '1', 'menu_id' => $funciones['id']),
            array('role_id' => '1', 'menu_id' => $tipoInvestigacion['id']),
            array('role_id' => '1', 'menu_id' => $participaciones['id']),
            array('role_id' => '1', 'menu_id' => $cadencia['id']),
            array('role_id' => '1', 'menu_id' => $tipoDesarrollo['id']),
            array('role_id' => '1', 'menu_id' => $finInvestigaciones['id']),
            array('role_id' => '1', 'menu_id' => $tipoActividad['id']),
            array('role_id' => '1', 'menu_id' => $lineaInvestigaciones['id']),
        ];
        DB::table('menus_roles')->insert($menutaxonomia);


        /////PUBLICO///////
        $menuPublico = Menu::create([
            'name' => 'Público',
            'url' => '/',
            'order' => '1',
            'parent' => '0',
            'icono' => 'fas fa-globe',
        ]);

        //Usuarios
        $user = Menu::create([
            'name' => 'Usuarios',
            'url' => 'users',
            'order' => '0',
            'parent' => $menuPublico['id'],
            'icono' => 'fa fa-user',
        ]);

        //Institución
        $instituciones = Menu::create([
            'name' => 'Institución',
            'url' => 'instituciones',
            'order' => '1',
            'parent' => $menuPublico['id'],
            'icono' => 'fa fa-building',
        ]);

        $menuRols1 = [
            array('role_id' => '1', 'menu_id' => $menuPublico['id']),
            array('role_id' => '2', 'menu_id' => $menuPublico['id']),
            array('role_id' => '1', 'menu_id' => $user['id']),
            array('role_id' => '2', 'menu_id' => $user['id']),
            array('role_id' => '1', 'menu_id' => $instituciones['id']),
            array('role_id' => '2', 'menu_id' => $instituciones['id']),
        ];
        DB::table('menus_roles')->insert($menuRols1);


        /////Gestión de Proyectos///////
        $menugestion = Menu::create([
            'name' => 'Gestión de Proyectos',
            'url' => '/',
            'order' => '2',
            'parent' => '0',
            'icono' => 'far fa-compass',
        ]);

        //Zarpe Nacional
        $proyectos = Menu::create([
            'name' => 'Proyectos',
            'url' => 'proyectos',
            'order' => '0',
            'parent' => $menugestion['id'],
            'icono' => 'fa fa-sheet-plastic',
        ]);

        $busqueda = Menu::create([
            'name' => 'Búsqueda',
            'url' => 'busqueda-proyectos',
            'order' => '2',
            'parent' => $menugestion['id'],
            'icono' => 'fas fa-search-plus',
        ]);
        $menuRols2 = [
            array('role_id' => '1', 'menu_id' => $menugestion['id']),
            array('role_id' => '2', 'menu_id' => $menugestion['id']),
            array('role_id' => '3', 'menu_id' => $menugestion['id']),
            array('role_id' => '4', 'menu_id' => $menugestion['id']),
            array('role_id' => '5', 'menu_id' => $menugestion['id']),
            array('role_id' => '6', 'menu_id' => $menugestion['id']),
            array('role_id' => '7', 'menu_id' => $menugestion['id']),
            array('role_id' => '8', 'menu_id' => $menugestion['id']),

            array('role_id' => '1', 'menu_id' => $proyectos['id']),
            array('role_id' => '2', 'menu_id' => $proyectos['id']),
            array('role_id' => '3', 'menu_id' => $proyectos['id']),
            array('role_id' => '4', 'menu_id' => $proyectos['id']),
            array('role_id' => '5', 'menu_id' => $proyectos['id']),
            array('role_id' => '6', 'menu_id' => $proyectos['id']),
            array('role_id' => '7', 'menu_id' => $proyectos['id']),
            array('role_id' => '8', 'menu_id' => $proyectos['id']),

            array('role_id' => '1', 'menu_id' => $busqueda['id']),
            array('role_id' => '2', 'menu_id' => $busqueda['id']),
            array('role_id' => '8', 'menu_id' => $busqueda['id']),
        ];
        DB::table('menus_roles')->insert($menuRols2);
    }
}