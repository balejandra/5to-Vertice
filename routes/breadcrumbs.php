<?php

use App\Models\Proyectos\Proyecto;
use App\Models\Publico\Estatus;
use App\Models\Publico\Institucion;
use App\Models\Publico\Menu;
use App\Models\Publico\RoleOwn;
use App\Models\Taxonomia\CadenciaInvestigativa;
use App\Models\Taxonomia\FinInvestigacion;
use App\Models\Taxonomia\Funcion;
use App\Models\Taxonomia\LineaInvestigacion;
use App\Models\Taxonomia\Origen;
use App\Models\Taxonomia\Participacion;
use App\Models\Taxonomia\TipoActividad;
use App\Models\Taxonomia\TipoDesarrollo;
use App\Models\Taxonomia\TipoInvestigacion;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// MENUS
Breadcrumbs::for('menus.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Menús', route('menus.index'));
});

// Migas de pan para la ruta 'menus.create'
Breadcrumbs::for('menus.create', function (BreadcrumbTrail $trail) {
    $trail->parent('menus.index');
    $trail->push('Crear Menú', route('menus.create'));
});

// Migas de pan para la ruta 'menus.show'
Breadcrumbs::for('menus.show', function (BreadcrumbTrail $trail, Menu $menu) {
    $trail->parent('menus.index');
    $trail->push($menu->name, route('menus.show', $menu->id));
});

// Migas de pan para la ruta 'menus.edit'
Breadcrumbs::for('menus.edit', function (BreadcrumbTrail $trail, Menu $menu) {
    $trail->parent('menus.index');
    $trail->push('Editar Menú', route('menus.edit', $menu->id));
});

// Migas de pan para la ruta 'menuDelete.index'
Breadcrumbs::for('menuDelete.index', function (BreadcrumbTrail $trail) {
    $trail->parent('menus.index');
    $trail->push('Menús Eliminados', route('menuDelete.index'));
});

// Migas de pan para la ruta 'menuRols.index'
Breadcrumbs::for('menuRols.index', function (BreadcrumbTrail $trail) {
    $trail->parent('menus.index');
    $trail->push('Roles asociados a Menús', route('menuRols.index'));
});

//PERMISOS
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Permisos', route('permissions.index'));
});

Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Crear Permiso', route('permissions.create'));
});

Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('permissions.index');
    $trail->push('Editar Permiso', route('permissions.edit', $permission));
});

Breadcrumbs::for('permissions.show', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('permissions.index');
    $trail->push($permission->name, route('permissions.show', $permission));
});

Breadcrumbs::for('permissionDelete.index', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions.index');
    $trail->push('Permisos Eliminados', route('permissionDelete.index'));
});

//ROLES
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});

/*create*/
Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Crear Rol', route('roles.create'));
});

/*show*/
Breadcrumbs::for('roles.show', function (BreadcrumbTrail $trail, RoleOwn $role) {
    $trail->parent('roles.index');
    $trail->push($role->name, route('roles.show', $role->id));
});

/*edit*/
Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, RoleOwn $role) {
    $trail->parent('roles.index');
    $trail->push('Editar Rol', route('roles.edit', $role));
});

/*deleted*/
Breadcrumbs::for('rolesDeleted.index', function (BreadcrumbTrail $trail) {
    $trail->parent('roles.index');
    $trail->push('Roles Eliminados', route('rolesDeleted.index'));
});

//AUDITORIA
/*index*/
Breadcrumbs::for('auditables.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(' Auditoría', route('auditables.index'));
});

/*show*/
Breadcrumbs::for('auditables.show', function (BreadcrumbTrail $trail, string $id) {
    $trail->parent('auditables.index');
    $trail->push('Consultar Auditoría', route('auditables.show', $id));
});

//ESTATUS

//index
Breadcrumbs::for('estatus.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Estatus', route('estatus.index'));
});

// Migas de pan para la ruta 'estatus.create'
Breadcrumbs::for('estatus.create', function (BreadcrumbTrail $trail) {
    $trail->parent('estatus.index');
    $trail->push('Crear Estatus', route('estatus.create'));
});

// Migas de pan para la ruta 'estatus.show'
Breadcrumbs::for('estatus.show', function (BreadcrumbTrail $trail, Estatus $estatus) {
    $trail->parent('estatus.index');
    $trail->push($estatus->nombre, route('estatus.show', $estatus->id));
});

// Migas de pan para la ruta 'estatus.edit'
Breadcrumbs::for('estatus.edit', function (BreadcrumbTrail $trail, Estatus $estatus) {
    $trail->parent('estatus.index');
    $trail->push('Editar Estatus', route('estatus.edit', $estatus->id));
});


//USER

// Migas de pan para la ruta 'users.index'
Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Usuarios', route('users.index'));
});

// Migas de pan para la ruta 'users.create'
Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push('Crear Usuario', route('users.create'));
});

// Migas de pan para la ruta 'users.show'
Breadcrumbs::for('users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.index');
    $trail->push($user->nombres . " " . $user->apellidos, route('users.show', $user->id));
});

// Migas de pan para la ruta 'users.edit'
Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.index');
    $trail->push('Editar Usuario', route('users.edit', $user->id));
});

// Migas de pan para la ruta 'userDelete.index'
Breadcrumbs::for('userDelete.index', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index'); // Reemplaza 'users.index' por la ruta adecuada si es necesario.
    $trail->push('Usuarios Eliminados', route('userDelete.index'));
});

//INSTITUCIONES//
// Migas de pan para la ruta 'instituciones.index'
Breadcrumbs::for('instituciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Instituciones', route('instituciones.index'));
});

// Migas de pan para la ruta 'instituciones.create'
Breadcrumbs::for('instituciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('instituciones.index');
    $trail->push('Crear Institución', route('instituciones.create'));
});

// Migas de pan para la ruta 'instituciones.show'
Breadcrumbs::for('instituciones.show', function (BreadcrumbTrail $trail, Institucion $institucion) {
    $trail->parent('instituciones.index');
    $trail->push($institucion->nombre, route('instituciones.show', $institucion->id));
});

// Migas de pan para la ruta 'instituciones.edit'
Breadcrumbs::for('instituciones.edit', function (BreadcrumbTrail $trail, Institucion $institucion) {
    $trail->parent('instituciones.index');
    $trail->push('Editar Institución', route('instituciones.edit', $institucion->id));
});

// Migas de pan para la ruta 'institucionDeleted.index'
Breadcrumbs::for('institucionDeleted.index', function (BreadcrumbTrail $trail) {
    $trail->parent('instituciones.index');
    $trail->push('Instituciones Eliminadas', route('institucionDeleted.index'));
});

//ORIGENES
// Migas de pan para la ruta 'origenes.index'
Breadcrumbs::for('origenes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Orígenes', route('origenes.index'));
});

// Migas de pan para la ruta 'origenes.create'
Breadcrumbs::for('origenes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('origenes.index');
    $trail->push('Crear Origen', route('origenes.create'));
});

// Migas de pan para la ruta 'origenes.show'
Breadcrumbs::for('origenes.show', function (BreadcrumbTrail $trail, Origen $origen) {
    $trail->parent('origenes.index');
    $trail->push($origen->nombre, route('origenes.show', $origen->id));
});

// Migas de pan para la ruta 'origenes.edit'
Breadcrumbs::for('origenes.edit', function (BreadcrumbTrail $trail, Origen $origen) {
    $trail->parent('origenes.index');
    $trail->push('Editar Origen', route('origenes.edit', $origen->id));
});

// Migas de pan para la ruta 'funciones.index'
Breadcrumbs::for('funciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Funciones', route('funciones.index'));
});

// Migas de pan para la ruta 'funciones.create'
Breadcrumbs::for('funciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('funciones.index');
    $trail->push('Crear Función', route('funciones.create'));
});

// Migas de pan para la ruta 'funciones.show'
Breadcrumbs::for('funciones.show', function (BreadcrumbTrail $trail, Funcion $funcion) {
    $trail->parent('funciones.index');
    $trail->push($funcion->nombre, route('funciones.show', $funcion->id));
});

// Migas de pan para la ruta 'funciones.edit'
Breadcrumbs::for('funciones.edit', function (BreadcrumbTrail $trail, Funcion $funcion) {
    $trail->parent('funciones.index');
    $trail->push('Editar Función', route('funciones.edit', $funcion->id));
});

//TIPO DE INVESTIGACION
// Migas de pan para la ruta 'tipoInvestigaciones.index'
Breadcrumbs::for('tipoInvestigaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Tipos de Investigaciones', route('tipoInvestigaciones.index'));
});

// Migas de pan para la ruta 'tipoInvestigaciones.create'
Breadcrumbs::for('tipoInvestigaciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tipoInvestigaciones.index');
    $trail->push('Crear Tipo de Investigación', route('tipoInvestigaciones.create'));
});

// Migas de pan para la ruta 'tipoInvestigaciones.show'
Breadcrumbs::for('tipoInvestigaciones.show', function (BreadcrumbTrail $trail, TipoInvestigacion $tipoInvestigacion) {
    $trail->parent('tipoInvestigaciones.index');
    $trail->push($tipoInvestigacion->nombre, route('tipoInvestigaciones.show', $tipoInvestigacion->id));
});

// Migas de pan para la ruta 'tipoInvestigaciones.edit'
Breadcrumbs::for('tipoInvestigaciones.edit', function (BreadcrumbTrail $trail, TipoInvestigacion $tipoInvestigacion) {
    $trail->parent('tipoInvestigaciones.index');
    $trail->push('Editar Tipo de Investigación', route('tipoInvestigaciones.edit', $tipoInvestigacion->id));
});

//PARTICIPACION
// Migas de pan para la ruta 'participaciones.index'
Breadcrumbs::for('participaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Participaciones', route('participaciones.index'));
});

// Migas de pan para la ruta 'participaciones.create'
Breadcrumbs::for('participaciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('participaciones.index');
    $trail->push('Crear Participación', route('participaciones.create'));
});

// Migas de pan para la ruta 'participaciones.show'
Breadcrumbs::for('participaciones.show', function (BreadcrumbTrail $trail, Participacion $participacion) {
    $trail->parent('participaciones.index');
    $trail->push($participacion->nombre, route('participaciones.show', $participacion->id));
});

// Migas de pan para la ruta 'participaciones.edit'
Breadcrumbs::for('participaciones.edit', function (BreadcrumbTrail $trail, Participacion $participacion) {
    $trail->parent('participaciones.index');
    $trail->push('Editar Participación', route('participaciones.edit', $participacion->id));
});

//CADENCIA INVESTIGATICA
// Migas de pan para la ruta 'cadenciaInvestigativas.index'
Breadcrumbs::for('cadenciaInvestigativas.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Cadencias Investigativas', route('cadenciaInvestigativas.index'));
});

// Migas de pan para la ruta 'cadenciaInvestigativas.create'
Breadcrumbs::for('cadenciaInvestigativas.create', function (BreadcrumbTrail $trail) {
    $trail->parent('cadenciaInvestigativas.index');
    $trail->push('Crear Cadencia Investigativa', route('cadenciaInvestigativas.create'));
});

// Migas de pan para la ruta 'cadenciaInvestigativas.show'
Breadcrumbs::for('cadenciaInvestigativas.show', function (BreadcrumbTrail $trail, CadenciaInvestigativa $cadenciaInvestigativa) {
    $trail->parent('cadenciaInvestigativas.index');
    $trail->push($cadenciaInvestigativa->nombre, route('cadenciaInvestigativas.show', $cadenciaInvestigativa->id));
});

// Migas de pan para la ruta 'cadenciaInvestigativas.edit'
Breadcrumbs::for('cadenciaInvestigativas.edit', function (BreadcrumbTrail $trail, CadenciaInvestigativa $cadenciaInvestigativa) {
    $trail->parent('cadenciaInvestigativas.index');
    $trail->push('Editar Cadencia Investigativa', route('cadenciaInvestigativas.edit', $cadenciaInvestigativa->id));
});

//TIPO DESARROLLO
// Migas de pan para la ruta 'tipoDesarrollos.index'
Breadcrumbs::for('tipoDesarrollos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Tipos de Desarrollo', route('tipoDesarrollos.index'));
});

// Migas de pan para la ruta 'tipoDesarrollos.create'
Breadcrumbs::for('tipoDesarrollos.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tipoDesarrollos.index');
    $trail->push('Crear Tipo de Desarrollo', route('tipoDesarrollos.create'));
});

// Migas de pan para la ruta 'tipoDesarrollos.show'
Breadcrumbs::for('tipoDesarrollos.show', function (BreadcrumbTrail $trail, TipoDesarrollo $tipoDesarrollo) {
    $trail->parent('tipoDesarrollos.index');
    $trail->push($tipoDesarrollo->nombre, route('tipoDesarrollos.show', $tipoDesarrollo->id));
});

// Migas de pan para la ruta 'tipoDesarrollos.edit'
Breadcrumbs::for('tipoDesarrollos.edit', function (BreadcrumbTrail $trail, TipoDesarrollo $tipoDesarrollo) {
    $trail->parent('tipoDesarrollos.index');
    $trail->push('Editar Tipo de Desarrollo', route('tipoDesarrollos.edit', $tipoDesarrollo->id));
});

//FIN INVESTIGACION
// Migas de pan para la ruta 'finInvestigaciones.index'
Breadcrumbs::for('finInvestigaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Fines de Investigación', route('finInvestigaciones.index'));
});

// Migas de pan para la ruta 'finInvestigaciones.create'
Breadcrumbs::for('finInvestigaciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('finInvestigaciones.index');
    $trail->push('Crear Fin de Investigación', route('finInvestigaciones.create'));
});

// Migas de pan para la ruta 'finInvestigaciones.show'
Breadcrumbs::for('finInvestigaciones.show', function (BreadcrumbTrail $trail, FinInvestigacion $finInvestigacion) {
    $trail->parent('finInvestigaciones.index');
    $trail->push($finInvestigacion->nombre, route('finInvestigaciones.show', $finInvestigacion->id));
});

// Migas de pan para la ruta 'finInvestigaciones.edit'
Breadcrumbs::for('finInvestigaciones.edit', function (BreadcrumbTrail $trail, FinInvestigacion $finInvestigacion) {
    $trail->parent('finInvestigaciones.index');
    $trail->push('Editar Fin de Investigación', route('finInvestigaciones.edit', $finInvestigacion->id));
});

//TIPO ACTIVIDAD
// Migas de pan para la ruta 'tipoActividades.index'
Breadcrumbs::for('tipoActividades.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Tipos de Actividades', route('tipoActividades.index'));
});

// Migas de pan para la ruta 'tipoActividades.create'
Breadcrumbs::for('tipoActividades.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tipoActividades.index');
    $trail->push('Crear Tipo de Actividad', route('tipoActividades.create'));
});

// Migas de pan para la ruta 'tipoActividades.show'
Breadcrumbs::for('tipoActividades.show', function (BreadcrumbTrail $trail, TipoActividad $tipoActividad) {
    $trail->parent('tipoActividades.index');
    $trail->push($tipoActividad->nombre, route('tipoActividades.show', $tipoActividad->id));
});

// Migas de pan para la ruta 'tipoActividades.edit'
Breadcrumbs::for('tipoActividades.edit', function (BreadcrumbTrail $trail, TipoActividad $tipoActividad) {
    $trail->parent('tipoActividades.index');
    $trail->push('Editar Tipo de Actividad', route('tipoActividades.edit', $tipoActividad->id));
});

//LINEAS INVESTIGACION
// Migas de pan para la ruta 'lineaInvestigaciones.index'
Breadcrumbs::for('lineaInvestigaciones.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Líneas de Investigación', route('lineaInvestigaciones.index'));
});

// Migas de pan para la ruta 'lineaInvestigaciones.create'
Breadcrumbs::for('lineaInvestigaciones.create', function (BreadcrumbTrail $trail) {
    $trail->parent('lineaInvestigaciones.index');
    $trail->push('Crear Línea de Investigación', route('lineaInvestigaciones.create'));
});

// Migas de pan para la ruta 'lineaInvestigaciones.show'
Breadcrumbs::for('lineaInvestigaciones.show', function (BreadcrumbTrail $trail, LineaInvestigacion $lineaInvestigacion) {
    $trail->parent('lineaInvestigaciones.index');
    $trail->push($lineaInvestigacion->nombre, route('lineaInvestigaciones.show', $lineaInvestigacion->id));
});

// Migas de pan para la ruta 'lineaInvestigaciones.edit'
Breadcrumbs::for('lineaInvestigaciones.edit', function (BreadcrumbTrail $trail, LineaInvestigacion $lineaInvestigacion) {
    $trail->parent('lineaInvestigaciones.index');
    $trail->push('Editar Línea de Investigación', route('lineaInvestigaciones.edit', $lineaInvestigacion->id));
});



//PROYECTOS
// Migas de pan para la ruta 'proyectos.index'
Breadcrumbs::for('proyectos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard'); // Reemplaza 'dashboard' por la ruta adecuada si es necesario.
    $trail->push('Proyectos', route('proyectos.index'));
});


// Migas de pan para la ruta 'proyectos.show'
Breadcrumbs::for('proyectos.show', function (BreadcrumbTrail $trail, Proyecto $proyecto) {
    $trail->parent('proyectos.index');
    $trail->push($proyecto->nombre, route('proyectos.show', $proyecto->id));
});

// Migas de pan para la ruta 'proyectos.edit'
Breadcrumbs::for('proyectos.edit', function (BreadcrumbTrail $trail, Proyecto $proyecto) {
    $trail->parent('proyectos.index');
    $trail->push('Editar Proyecto', route('proyectos.edit', $proyecto->id));
});


// Migas de pan para la ruta 'proyectos.create'
Breadcrumbs::for('proyectos.step1', function (BreadcrumbTrail $trail) {
    $trail->parent('proyectos.index');
    $trail->push('Paso 1 - Datos', route('proyectos.step1'));
});


Breadcrumbs::for('proyectos.step2', function (BreadcrumbTrail $trail) {
    $trail->parent('proyectos.index');
    $trail->push('Paso 2 - Contenido', route('proyectos.step2'));
});

Breadcrumbs::for('proyectos.step3', function (BreadcrumbTrail $trail) {
    $trail->parent('proyectos.index');
    $trail->push('Paso 3 - Personal', route('proyectos.step3'));
});

Breadcrumbs::for('proyectos.step4', function (BreadcrumbTrail $trail) {
    $trail->parent('proyectos.index');
    $trail->push('Paso 4 - Taxonomía', route('proyectos.step4'));
});
