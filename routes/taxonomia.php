<?php

use App\Http\Controllers\Publico\EstatusController;
use App\Http\Controllers\Taxonomia\CadenciaInvestigativaController;
use App\Http\Controllers\Taxonomia\FinInvestigacionController;
use App\Http\Controllers\Taxonomia\FuncionController;
use App\Http\Controllers\Taxonomia\LineaInvestigacionController;
use App\Http\Controllers\Taxonomia\OrigenController;
use App\Http\Controllers\Taxonomia\ParticipacionController;
use App\Http\Controllers\Taxonomia\TipoActividadController;
use App\Http\Controllers\Taxonomia\TipoDesarrolloController;
use App\Http\Controllers\Taxonomia\TipoInvestigacionController;
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
    /*ESTATUS*/
    Route::resource('estatus', EstatusController::class);

    /*ORIGENES*/
    Route::resource('origenes', OrigenController::class);

    /*FUNCIONES*/
    Route::resource('funciones', FuncionController::class);

    /*TIPO INVESTIGACION*/
    Route::resource('tipoInvestigaciones', TipoInvestigacionController::class);

    /*PARTICIPACION*/
    Route::resource('participaciones', ParticipacionController::class);

    /*CADENCIA INVESTIGATIVA*/
    Route::resource('cadenciaInvestigativas', CadenciaInvestigativaController::class);

    /*TIPO DESARROLLO*/
    Route::resource('tipoDesarrollos', TipoDesarrolloController::class);

    /*FIN INVESTIGACION*/
    Route::resource('finInvestigaciones', FinInvestigacionController::class);

    /*TIPO ACTIVIDAD*/
    Route::resource('tipoActividades', TipoActividadController::class);

    /*LINEA INVESTIGACION*/
    Route::resource('lineaInvestigaciones', LineaInvestigacionController::class);

});