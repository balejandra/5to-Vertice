<?php

namespace App\Http\Controllers\Proyectos;

use Illuminate\Http\Request;
use App\Models\Zarpes\Status;
use App\Models\Publico\Paises;
use App\Models\Publico\Sector;
use App\Models\Publico\Estatus;
use App\Models\Taxonomia\Origen;
use App\Models\Publico\Capitania;
use App\Models\Taxonomia\Funcion;
use App\Models\Publico\Institucion;
use App\Models\Zarpes\PermisoZarpe;
use App\Http\Controllers\Controller;
use App\Models\Zarpes\PermisoEstadia;
use App\Models\Taxonomia\Participacion;
use App\Models\Taxonomia\TipoActividad;
use App\Models\Taxonomia\TipoDesarrollo;
use App\Models\Taxonomia\FinInvestigacion;
use App\Models\Taxonomia\TipoInvestigacion;
use App\Models\Taxonomia\LineaInvestigacion;
use App\Models\Zarpes\EstablecimientoNautico;
use App\Models\Taxonomia\CadenciaInvestigativa;


class BusquedaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        dd('indez');
        $queries = false;
        $instituciones = Institucion::pluck('nombre', 'id');
        $sectores = Sector::pluck('nombre', 'id');
        $estatus = Estatus::pluck('nombre', 'id');
        $origen = Origen::pluck('nombre', 'id');
        $funciones = Funcion::pluck('nombre', 'id');
        $tiposInvestigacion = TipoInvestigacion::pluck('nombre', 'id');
        $participaciones = Participacion::pluck('nombre', 'id');
        $cadenciasInvestigativas = CadenciaInvestigativa::pluck('nombre', 'id');
        $tiposDesarrollo = TipoDesarrollo::pluck('nombre', 'id');
        $finesInvestigacion = FinInvestigacion::pluck('nombre', 'id');
        $tiposActividad = TipoActividad::pluck('nombre', 'id');
        $lineasInvestigacion = LineaInvestigacion::pluck('nombre', 'id');

        return view(
            'proyectos.busqueda.search',
            [
                'instituciones' => $instituciones,
                'sectores' => $sectores,
                'queries' => $queries,
                'estatus' => $estatus,
                'origen' => $origen,
                'funciones' => $funciones,
                'tipoInvestigaciones' => $tiposInvestigacion,
                'participaciones' => $participaciones,
                'cadenciasInvestigativas' => $cadenciasInvestigativas,
                'tiposDesarrollo' => $tiposDesarrollo,
                'finesInvestigacion' => $finesInvestigacion,
                'tiposActividad' => $tiposActividad,
                'lineasInvestigacion' => $lineasInvestigacion
            ]
        );
    }
}
