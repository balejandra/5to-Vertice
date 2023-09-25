<?php

use App\Http\Controllers\Proyectos\NotificacionesController;
use App\Http\Controllers\Proyectos\ProyectoController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {

    /*TIPO ACTIVIDAD*/
    //Route::resource('proyectos', ProyectosController::class);

    /*INDEX PROYECTOS*/
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');

    /*PASO 1*/
    Route::get('/proyectos/create-one-datos', [ProyectoController::class, 'createStep1Datos'])->name('proyectos.step1');
    Route::post('/proyectos/create-one-datos', [ProyectoController::class, 'postCreateStep1Datos'])->name('proyectos.postStep1.datos');
    /*PASO 2*/
    Route::get('/proyectos/create-two-contenido', [ProyectoController::class, 'createStep2Contenido'])->name('proyectos.step2');
    Route::post('/proyectos/create-two-datos', [ProyectoController::class, 'postCreateStep2Contenido'])->name('proyectos.postStep2.contenido');
    /*PASO 3*/
    Route::get('/proyectos/create-three-contenido', [ProyectoController::class, 'createStep3Personal'])->name('proyectos.step3');
    Route::post('/proyectos/create-three-contenido', [ProyectoController::class, 'postCreateStep3Personal'])->name('proyectos.postStep3.personal');
    /*PASO 4*/
    Route::get('/proyectos/create-four-taxonomia', [ProyectoController::class, 'createStep4Taxonomia'])->name('proyectos.step4');
    Route::post('/proyectos/create-four-taxonomia', [ProyectoController::class, 'postCreateStep4Taxonomia'])->name('proyectos.postStep4.taxonomia');
    /*PASO 5*/
    Route::get('/proyectos/create-five-financiero', [ProyectoController::class, 'createStep5Financiero'])->name('proyectos.step5');
    Route::post('/proyectos/create-five-financiero', [ProyectoController::class, 'postCreateStep5Financiero'])->name('proyectos.postStep5.financiero');
    /*PASO 6*/
    Route::get('/proyectos/create-six-soluciones', [ProyectoController::class, 'createStep6Soluciones'])->name('proyectos.step6');
    Route::post('/proyectos/create-six-soluciones', [ProyectoController::class, 'store'])->name('proyectos.store');

    /*SHOW PROYECTOS*/
    Route::get('proyectos/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');

    /*UPDATE ESTATUS PROYECTOS*/
    Route::get('proyectos/update-estatus/{id}/{estatus}', [ProyectoController::class, 'updateStatus'])->name('proyectos.updateStatus');
    
    /*NOTIFICACIONES*/
    Route::get('notificaciones/index', [NotificacionesController::class, 'index'])->name('notificaciones.index');
    Route::get('notificaciones/{notificacion}', [NotificacionesController::class, 'show'])->name('notificaciones.show');


});