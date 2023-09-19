<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spatie
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            //Permisos para users
            'listar-usuario',
            'crear-usuario',
            'editar-usuario',
            'consultar-usuario',
            'eliminar-usuario',

            //queriePermisoController para roles
            'listar-rol',
            'crear-rol',
            'editar-rol',
            'consultar-rol',
            'eliminar-rol',

            //Permisos para queriePermisoController
            'listar-permiso',
            'crear-permiso',
            'editar-permiso',
            'consultar-permiso',
            'eliminar-permiso',

            //Permisos para menus
            'listar-menu',
            'crear-menu',
            'editar-menu',
            'consultar-menu',
            'eliminar-menu',

            //Permisos para estatus
            'listar-estatus',
            'crear-estatus',
            'editar-estatus',
            'consultar-estatus',
            'eliminar-estatus',

            //queriePermisoController para Auditoria
            'listar-auditoria',
            'consultar-auditoria',

            //queriePermisoController para Notificaciones
            'consultar-notificaciones',
            'listar-notificaciones',

            //Permisos para institucion
            'listar-institucion',
            'crear-institucion',
            'editar-institucion',
            'consultar-institucion',
            'eliminar-institucion',

            //Permisos para institucion-propia
            'listar-institucionpropia',
            'crear-institucionpropia',
            'editar-institucionpropia',
            'consultar-institucionpropia',
            'eliminar-institucionpropia',

            //querie para proyectos
            'consultar-proyecto',
            'crear-proyecto',
            'editar-proyecto',
            'actualizar-proyecto',
            'aprobar-proyecto',
            'devolucion-proyecto',
            'anular-proyecto-destino',
            'anular-proyecto-origen',
            'listar-proyectos-todos',
            //admin
            'listar-proyectos-generados', //usuariosweb
            'listar-proyectos-origen-autor',
            'listar-proyectos-origen-revisor',
            'listar-proyectos-origen-aprobador',
            'listar-proyectos-destino_revisor',
            'listar-proyectos-destino_aprobador',

            //querie reportes
            'busqueda-avanzada',
            'busqueda-simple',
            'listar-busqueda',
            'show-busqueda',

            // Categoría: Origen
            'listar-origen',
            'crear-origen',
            'editar-origen',
            'consultar-origen',
            'eliminar-origen',

            // Categoría: Función
            'listar-funcion',
            'crear-funcion',
            'editar-funcion',
            'consultar-funcion',
            'eliminar-funcion',

            // Categoría: Tipo de Investigación
            'listar-tipoinvestigacion',
            'crear-tipoinvestigacion',
            'editar-tipoinvestigacion',
            'consultar-tipoinvestigacion',
            'eliminar-tipoinvestigacion',

            // Categoría: Participación
            'listar-participacion',
            'crear-participacion',
            'editar-participacion',
            'consultar-participacion',
            'eliminar-participacion',

            // Categoría: Cadencia Investigativa
            'listar-cadenciainvestigativa',
            'crear-cadenciainvestigativa',
            'editar-cadenciainvestigativa',
            'consultar-cadenciainvestigativa',
            'eliminar-cadenciainvestigativa',

            // Categoría: Tipo de Desarrollo
            'listar-tipodesarrollo',
            'crear-tipodesarrollo',
            'editar-tipodesarrollo',
            'consultar-tipodesarrollo',
            'eliminar-tipodesarrollo',

            // Categoría: Fin de Investigación
            'listar-fininvestigacion',
            'crear-fininvestigacion',
            'editar-fininvestigacion',
            'consultar-fininvestigacion',
            'eliminar-fininvestigacion',

            // Categoría: Fin de Investigación
            'listar-lineainvestigacion',
            'crear-lineainvestigacion',
            'editar-lineainvestigacion',
            'consultar-lineainvestigacion',
            'eliminar-lineainvestigacion',


            // Categoría: Tipo de Actividad
            'listar-tipoactividad',
            'crear-tipoactividad',
            'editar-tipoactividad',
            'consultar-tipoactividad',
            'eliminar-tipoactividad',

            // Categoría: Sector
            'listar-sector',
            'crear-sector',
            'editar-sector',
            'consultar-sector',
            'eliminar-sector'

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}