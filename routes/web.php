<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Publico\MenuController;
use App\Http\Controllers\Publico\RoleController;
use App\Http\Controllers\Publico\UserController;
use App\Http\Controllers\Publico\AuditsController;
use App\Http\Controllers\Publico\Menu_rolController;
use App\Http\Controllers\Publico\PermissionController;
use App\Http\Controllers\Publico\InstitucionController;
use App\Http\Controllers\Publico\NotificacionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthenticatedSessionController::class, 'create']);



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*MENUS*/
    Route::resource('menus', MenuController::class);
    Route::resource('menuRols', Menu_rolController::class);
    Route::get('menuDelete.index', [MenuController::class, 'indexMenuDeleted'])->name('menuDelete.index');
    Route::get('menuDeleted/{menu}', [MenuController::class, 'restoreMenuDeleted'])->name('menuDeleted.restore');

    /*PERMISOS*/
    Route::resource('permissions', PermissionController::class);
    Route::get('permissionDelete.index', [PermissionController::class, 'indexPermissionDeleted'])->name('permissionDelete.index');
    Route::get('permissionDeleted/{menu}', [PermissionController::class, 'restorePermissionDeleted'])->name('permissionDeleted.restore');

    /*ROLES*/
    Route::resource('roles', RoleController::class);
    Route::get('rolesDeleted.index', [RoleController::class, 'indexRolesDeleted'])->name('rolesDeleted.index');
    Route::get('roleDeleted/{role}', [RoleController::class, 'restoreRoleDeleted'])->name('roleDeleted.restore');

    /*AUDITORIA*/
    Route::get('auditables', [AuditsController::class, 'index'])->name('auditables.index');
    Route::get('auditables/{id}', [AuditsController::class, 'show'])->name('auditables.show');

    /*USER*/
    Route::resource('users', UserController::class);
    Route::get('userDelete.index', [UserController::class, 'indexUserDeleted'])->name('userDelete.index');
    Route::get('userDeleted/{user}', [UserController::class, 'restoreUserDeleted'])->name('userDeleted.restore');

    /*INSTITUCIONES*/
    Route::resource('instituciones', InstitucionController::class);
    Route::get('institucionDeleted.index', [InstitucionController::class, 'indexInstitucionDeleted'])->name('institucionDeleted.index');
    Route::get('institucionDeleted/{institucione}', [InstitucionController::class, 'restoreInstitucionDeleted'])->name('institucionDeleted.restore');

    /*NOTIFICACIONES*/
    Route::get('/notificaciones/filter', [NotificacionController::class, 'busqueda'])->name('notificaciones.filter');
    Route::get('notificaciones/index', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::get('notificaciones/{notificacion}', [NotificacionController::class, 'show'])->name('notificaciones.show');
});

require __DIR__ . '/auth.php';
