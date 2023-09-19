<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use App\Models\Proyectos\Proyecto;
use App\Models\Taxonomia\CadenciaInvestigativa;
use App\Models\Taxonomia\FinInvestigacion;
use App\Models\Taxonomia\Funcion;
use App\Models\Taxonomia\Origen;
use App\Models\Taxonomia\Participacion;
use App\Models\Taxonomia\TipoActividad;
use App\Models\Taxonomia\TipoDesarrollo;
use App\Models\Taxonomia\TipoInvestigacion;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    private $step;

    public function __construct()
    {
        $this->step = 1;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->session()->forget('proyecto');

        $userAuth = auth()->id();
        if (auth()->user()->hasPermissionTo('listar-proyectos-origen-autor')) {
            $proyectos = Proyecto::where('user_id', $userAuth)->get();
            return view('proyectos.info.index')->with('proyectos', $proyectos);
        }
    }

    public function createStep1Datos(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');
        return view('proyectos.crear.step-one-datos')
            ->with('step', $this->step)
            ->with('proyecto', $proyecto);
    }

    public function postCreateStep1Datos(Request $request)
    {

        $validatedData = $request->validate([
            'nombre_proyecto' => 'required',
            'tiempo_ejecucion' => 'required',
            'ano_ejecucion' => 'required',
        ]);

        if (empty($request->session()->get('proyecto'))) {
            $proyecto = new Proyecto();
            $proyecto->fill($validatedData);
            $request->session()->put('proyecto', $proyecto);
        } else {
            $proyecto = $request->session()->get('proyecto');
            $proyecto->fill($validatedData);
            $request->session()->put('proyecto', $proyecto);
        }
        $this->step = 2;
        return redirect(route('proyectos.step2'));
    }

    public function createStep2Contenido(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');

        return session()->has('proyecto') && !empty($proyecto->nombre_proyecto)
            ? view('proyectos.crear.step-two-contenido', ['step' => $this->step = 2, 'proyecto' => $proyecto])
            : redirect(route('proyectos.step1'));
    }

    public function postCreateStep2Contenido(Request $request)
    {
        $validatedData = $request->validate([
            'metas_ano_actual' => 'required',
            'informacion_interes' => 'nullable',
        ]);

        $proyecto = $request->session()->get('proyecto');
        $proyecto->fill($validatedData);
        $request->session()->put('proyecto', $proyecto);

        return redirect(route('proyectos.step3'));
    }

    public function createStep3Personal(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');
        return session()->has('proyecto') && !empty($proyecto->nombre_proyecto)
            ? view('proyectos.crear.step-three-personal', ['step' => $this->step = 3, 'proyecto' => $proyecto])
            : redirect(route('proyectos.step1'));
    }


    public function postCreateStep3Personal(Request $request)
    {
        $validatedData = $request->validate([
            'jefe_proyecto' => 'required|string',
            'persona_contacto' => 'required|string',
        ]);

        $proyecto = $request->session()->get('proyecto');
        $proyecto->fill($validatedData);
        $request->session()->put('proyecto', $proyecto);

        return redirect(route('proyectos.step4'));
    }

    public function createStep4Taxonomia(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');

        if (session()->has('proyecto') && !empty($proyecto->nombre_proyecto)) {
            $origen = Origen::pluck('nombre', 'id');
            $funciones = Funcion::pluck('nombre', 'id');
            $tiposInvestigacion = TipoInvestigacion::pluck('nombre', 'id');
            $participaciones = Participacion::pluck('nombre', 'id');
            $cadenciasInvestigativas = CadenciaInvestigativa::pluck('nombre', 'id');
            $tiposDesarrollo = TipoDesarrollo::pluck('nombre', 'id');
            $finesInvestigacion = FinInvestigacion::pluck('nombre', 'id');
            $tiposActividad = TipoActividad::pluck('nombre', 'id');

            return view('proyectos.crear.step-four-taxonomia', [
                'step' => $this->step = 4,
                'proyecto' => $proyecto,
                'origen' => $origen,
                'funciones' => $funciones,
                'tipoInvestigaciones' => $tiposInvestigacion,
                'participaciones' => $participaciones,
                'cadenciasInvestigativas' => $cadenciasInvestigativas,
                'tiposDesarrollo' => $tiposDesarrollo,
                'finesInvestigacion' => $finesInvestigacion,
                'tiposActividad' => $tiposActividad,
            ]);
        } else {
            return redirect(route('proyectos.step1'));
        }
    }

    public function postCreateStep4Taxonomia(Request $request)
    {
        $validatedData = $request->validate([
            'origen' => 'required|string',
            'funciones' => 'required|string',
            'tipoInvestigaciones' => 'required|string',
            'participaciones' => 'required|string',
            'cadenciasInvestigativas' => 'required|string',
            'tiposDesarrollo' => 'required|string',
            'finesInvestigacion' => 'required|string',
            'tiposActividad' => 'required|string',
        ]);

        $proyecto = $request->session()->get('proyecto');
        $proyecto->fill($validatedData);
        $request->session()->put('proyecto', $proyecto);

        return redirect(route('proyectos.step4'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
