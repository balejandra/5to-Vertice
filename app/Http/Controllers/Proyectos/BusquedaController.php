<?php

namespace App\Http\Controllers\Proyectos;

use Illuminate\Http\Request;
use App\Models\Publico\Sector;
use App\Models\Publico\Estatus;
use App\Models\Taxonomia\Origen;
use App\Models\Taxonomia\Funcion;
use App\Models\Proyectos\Proyecto;
use App\Models\Publico\Institucion;
use App\Http\Controllers\Controller;
use App\Models\Taxonomia\Participacion;
use App\Models\Taxonomia\TipoActividad;
use App\Models\Taxonomia\TipoDesarrollo;
use Illuminate\Database\Eloquent\Builder;
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
        $proyectos=[];

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
                'lineasInvestigacion' => $lineasInvestigacion,
            ]
        );
    }

    public function searchProyecto(Request $request)
    {
        $nroPlanilla = $request->input('nro_planilla');
        $institucionId = $request->input('institucion_id');
        $sectorId = $request->input('sector_id');
        $estatusId = $request->input('estatus_id');
        $fecha_unica = $request->input('fecha_unica');
        $rango_fecha = $request->input('rango_fecha');
        $fechaInicial = $request->input('fecha_inicial');
        $fechaFinal = $request->input('fecha_final');
        $origenIds = $request->input('origen_id'); // Array
        $funcionIds = $request->input('funcion_id'); // Array
        $tipoInvestigacionIds = $request->input('tipo_investigacion_id'); // Array
        $participacionIds = $request->input('participacion_id'); // Array
        $cadenciaInvestigativaIds = $request->input('cadencia_investigativa_id'); // Array
        $tipoDesarrolloIds = $request->input('tipo_desarrollo_id'); // Array
        $finInvestigacionIds = $request->input('fin_investigacion_id'); // Array
        $tipoActividadIds = $request->input('tipo_actividad_id'); // Array
        $lineaInvestigacionIds = $request->input('linea_investigacion_id'); // Array

        $query = Proyecto::when($nroPlanilla, function (Builder $q, string $nroPlanilla) {
            $q->where('nro_planilla', $nroPlanilla);
        })
            ->when($institucionId, static function (Builder $q, array $institucionId) {
                $q->whereIn('institucion_id', $institucionId);
            })
            ->when($sectorId, static function (Builder $q, array $sectorId) {
                $q->whereIn('instituciones.sector_id', $sectorId)
                    ->join('public.instituciones', 'proyectos.institucion_id', '=', 'public.instituciones.id')
                    ->select('proyectos.*');
            })
            ->when($estatusId, static function (Builder $q, array $estatusId) {
                $q->whereIn('estatus_id', $estatusId);
            })
            ->when($origenIds, function ($q) use ($origenIds) {
                $q->whereIn('origen_id', $origenIds);
            })
            ->when($funcionIds, function ($q) use ($funcionIds) {
                $q->whereIn('funcion_id', $funcionIds);
            })
            ->when($tipoInvestigacionIds, function ($q) use ($tipoInvestigacionIds) {
                $q->whereIn('tipo_investigacion_id', $tipoInvestigacionIds);
            })
            ->when($participacionIds, function ($q) use ($participacionIds) {
                $q->whereIn('participacion_id', $participacionIds);
            })
            ->when($cadenciaInvestigativaIds, function ($q) use ($cadenciaInvestigativaIds) {
                $q->whereIn('cadencia_investigativa_id', $cadenciaInvestigativaIds);
            })
            ->when($tipoDesarrolloIds, function ($q) use ($tipoDesarrolloIds) {
                $q->whereIn('tipo_desarrollo_id', $tipoDesarrolloIds);
            })
            ->when($finInvestigacionIds, function ($q) use ($finInvestigacionIds) {
                $q->whereIn('fin_investigacion_id', $finInvestigacionIds);
            })
            ->when($tipoActividadIds, function ($q) use ($tipoActividadIds) {
                $q->whereIn('tipo_actividad_id', $tipoActividadIds);
            })
            ->when($lineaInvestigacionIds, function ($q) use ($lineaInvestigacionIds) {
                $q->whereIn('linea_investigacion_id', $lineaInvestigacionIds);
            })
            ->when($fecha_unica, function ($q) use ($request) {
                $q->whereDate('created_at', $request->input('fecha_unica'));
            })
            ->when($rango_fecha, function ($q) use ($request) {
                $q->whereBetween('created_at', [$request->fecha_inicial, $request->fecha_final]);
            })
            ->get();
        // dd($query);
        return view('proyectos.busqueda.table', ['proyectos' => $query]);
    }
}
