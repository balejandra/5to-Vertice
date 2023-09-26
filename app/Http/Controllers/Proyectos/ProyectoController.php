<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use App\Models\Proyectos\HistoricoProyecto;
use App\Models\Proyectos\Proyecto;
use App\Models\Publico\Estatus;
use App\Models\Publico\Institucion;
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
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

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
        $userAuth = auth()->user();

        /**ADMIN */
        if (auth()->user()->hasPermissionTo('listar-proyectos-todos')) {
            $proyectos = Proyecto::all();
            return view('proyectos.info.index')->with('proyectos', $proyectos);
        } elseif (auth()->user()->hasPermissionTo('listar-proyectos-origen-autor')) {
            /**AUTOR */
            $proyectos = Proyecto::where('user_id', $userAuth->id)->get();
            return view('proyectos.info.index')->with('proyectos', $proyectos);
        } elseif (auth()->user()->hasPermissionTo('listar-proyectos-origen-revisor')) {
            /**REVISOR ORIGEN*/
            $proyectos = Proyecto::where('institucion_id', $userAuth->institucion_id)->get();
            return view('proyectos.info.index')->with('proyectos', $proyectos);
        } elseif (auth()->user()->hasPermissionTo('listar-proyectos-origen-aprobador')) {
            /**APROBADOR ORIGEN */
            $proyectos = Proyecto::where('institucion_id', $userAuth->institucion_id)
                ->whereIn('estatus_id', [2, 4, 7])
                ->get();
            return view('proyectos.info.index')->with('proyectos', $proyectos);
        } elseif (auth()->user()->hasPermissionTo('listar-proyectos-destino_aprobador')) {
            /**APROBADOR DESTINO */
            $proyectos = Proyecto::where('estatus_id', 4)->get();
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

        $validatedData = $request->validate(
            [
                'nombre_proyecto' => 'required',
                'tiempo_ejecucion' => 'required',
                'ano_ejecucion' => 'required',
            ],
            [
                'nombre_proyecto.required' => 'El campo Nombre es obligatorio',
                'tiempo_ejecucion.required' => 'El campo Tiempo de Ejecución es obligatorio',
                'ano_ejecucion.required' => 'El campo Año de Ejecución es obligatorio',

            ]
        );

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
        $validatedData = $request->validate(
            [
                'metas_ano_actual' => 'required',
                'informacion_interes' => 'nullable',
            ],
            [
                'metas_ano_actual.required' => 'El campo Metas es obligatorio',
            ]
        );

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
        $validatedData = $request->validate(
            [
                'jefe_proyecto' => 'required|string',
                'persona_contacto' => 'required|string',
            ],
            [
                'jefe_proyecto.required' => 'El campo Jefe de Proyecto es obligatorio',
                'persona_contacto.required' => 'El campo Persona Contacto es obligatorio',
            ]
        );

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
            $lineasInvestigacion = LineaInvestigacion::pluck('nombre', 'id');

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
                'lineasInvestigacion' => $lineasInvestigacion
            ]);
        } else {
            return redirect(route('proyectos.step1'));
        }
    }

    public function postCreateStep4Taxonomia(Request $request)
    {
        $validatedData = $request->validate(
            [
                'origen_id' => 'required|integer',
                'funcion_id' => 'required|integer',
                'tipo_investigacion_id' => 'required|integer',
                'participacion_id' => 'required|integer',
                'cadencia_investigativa_id' => 'required|integer',
                'tipo_desarrollo_id' => 'required|integer',
                'fin_investigacion_id' => 'required|integer',
                'tipo_actividad_id' => 'required|integer',
                'linea_investigacion_id' => 'required|integer',
            ],
            [
                'origen_id.required' => 'El campo Origen es obligatorio',
                'funcion_id.required' => 'El campo Función es obligatorio',
                'tipo_investigacion_id.required' => 'El campo Tipo de Investigación es obligatorio',
                'participacion_id.required' => 'El campo Participación es obligatorio',
                'cadencia_investigativa_id.required' => 'El campo Cadencia de Investigación es obligatorio',
                'tipo_desarrollo_id.required' => 'El campo Tipo de Desarrollo es obligatorio',
                'fin_investigacion_id.required' => 'El campo Fin de Investigación es obligatorio',
                'tipo_actividad_id.required' => 'El campo Tipo de Actividad es obligatorio',
                'linea_investigacion_id.required' => 'El campo Línea de Investigación es obligatorio',
            ]
        );

        $proyecto = $request->session()->get('proyecto');
        $proyecto->fill($validatedData);
        $request->session()->put('proyecto', $proyecto);

        return redirect(route('proyectos.step5'));
    }

    public function createStep5Financiero(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');
        return session()->has('proyecto') && !empty($proyecto->nombre_proyecto)
            ? view('proyectos.crear.step-five-financiero', ['step' => $this->step = 5, 'proyecto' => $proyecto])
            : redirect(route('proyectos.step1'));
    }

    public function postCreateStep5Financiero(Request $request)
    {
        $validatedData = $request->validate(
            [
                'porcentaje_ejecucion_fisica' => 'nullable|numeric|between:0,100',
                'costo_total_proyecto' => 'required|numeric|min:0',
                'costo_transnacional' => 'nullable|numeric|min:0',
                'ahorro_nacion' => 'nullable|numeric|min:0',
            ],
            [
                'porcentaje_ejecucion_fisica.numeric' => 'El campo Porcentaje de Ejecución Física debe ser un número',
                'porcentaje_ejecucion_fisica.between' => 'El campo Porcentaje de Ejecución Física debe estar entre 0 y 100',
                'costo_total_proyecto.required' => 'El campo Costo Total Proyecto es obligatorio',
                'costo_transnacional.numeric' => 'El campo Costo Transnacional debe ser un número',
                'ahorro_nacion.numeric' => 'El campo Ahorro Nacional debe ser un número',
            ]
        );

        $proyecto = $request->session()->get('proyecto');
        $proyecto->fill($validatedData);
        $request->session()->put('proyecto', $proyecto);

        return redirect(route('proyectos.step6'));
    }

    public function createStep6Soluciones(Request $request)
    {
        $proyecto = $request->session()->get('proyecto');
        return session()->has('proyecto') && !empty($proyecto->nombre_proyecto)
            ? view('proyectos.crear.step-six-soluciones', ['step' => $this->step = 6, 'proyecto' => $proyecto])
            : redirect(route('proyectos.step1'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Obtener los datos de la sesión
        $datosProyecto = $request->session()->get('proyecto');

        $validatedData = $request->validate([
            'victoria_temprana' => 'nullable|string',
            'nudo_critico' => 'nullable|string',
        ]);
        $datosProyecto->fill($validatedData);
        $request->session()->put('proyecto', $datosProyecto);

        $porcentajeEjecucionFisica = $this->calcularPorcentajeEjecucion($datosProyecto['porcentaje_ejecucion_fisica'], 'calcular');

        $institucionId = auth()->user()->institucion_id; // Obtener la institución del usuario logueado
        $nroPlanilla = $this->generarNroPlanilla($institucionId); // Generar el correlativo
        $estatusId = 1; // ID de estatus pendiente
        $userId = auth()->id(); // Obtener el ID del usuario logueado

        // Combinar todos los datos en un arreglo
        $datosProyecto['institucion_id'] = $institucionId;
        $datosProyecto['nro_planilla'] = $nroPlanilla;
        $datosProyecto['estatus_id'] = $estatusId;
        $datosProyecto['user_id'] = $userId;
        $datosProyecto['porcentaje_ejecucion_fisica'] = $porcentajeEjecucionFisica;

        $proyecto_save = $datosProyecto->save();
        if ($proyecto_save) {
            $historic = HistoricoProyecto::create([
                'user_id' => $datosProyecto['user_id'],
                'proyecto_id' => $datosProyecto['id'],
                'accion' => 'Proyecto creado',
                'motivo' => 'Creación'
            ]);
            $mensajeUser = "El Sistema de Gestión de Proyectos 5to Vertice le notifica que ha generado una nueva solicitud de permiso de zarpe con su usuario y se encuentra en espera de aprobación.";
            $view = 'emails.proyectos.planilla';
            $titulo = 'Nueva Planilla de Proyectos ' . $datosProyecto->nro_planilla;
            $email = $this->SendMail($datosProyecto->user_id, $datosProyecto, $titulo, $mensajeUser, $view);

            Flash::success('Se ha generado la planilla <b>' . $nroPlanilla . '</b> exitosamente');
            $request->session()->forget('proyecto');
            return redirect()->route('proyectos.index');
        } else {
            Flash::success('Ha ocurrido un error al guardar la planilla, inténtelo de nuevo');
            $request->session()->forget('proyecto');
            return redirect()->route('proyectos.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        // dd($proyecto->id);
        $proyectoFind = Proyecto::find($proyecto->id);
        $revisiones = HistoricoProyecto::where('proyecto_id', $proyecto->id)->get();
        if (empty($proyectoFind)) {
            Flash::error('Proyecto no encontrado');

            return redirect(route('proyectos.index'));
        }

        return view('proyectos.info.show')
            ->with('proyecto', $proyectoFind)
            ->with('revisiones', $revisiones);
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

    public function generarNroPlanilla($institucionId)
    {
        // Obtener el año y el mes actual
        $yearActual = date('Y');
        $mesActual = date('m');
        $sigla = Institucion::select('sigla')->where('id', '=', $institucionId)->get();

        // Generar el número de correlativo basado en la institución y el año actual
        $correlativo = $sigla[0]->sigla . '-' . $yearActual . $mesActual;

        // Obtener la cantidad de proyectos existentes para esta institución en el mismo año
        $proyectosExisten = Proyecto::where('institucion_id', $institucionId)
            ->whereYear('created_at', '=', $yearActual)
            ->count();

        // Incrementar el correlativo en función de cuántos proyectos existen
        $correlativo .= '-' . ($proyectosExisten + 1);

        return $correlativo;
    }

    public function calcularPorcentajeEjecucion($porcentaje, $accion)
    {
        switch ($accion) {
            case 'calcular':
                return $porcentaje / 100;
            case 'mostrar':
                return $porcentaje * 100;
            default:
                throw new \InvalidArgumentException('Acción no válida: ' . $accion);
        }
    }

    public function SendMail($userIdTo, $proyecto, $tituloMail, $contenidoMail, $vistaMail, $idEstatus = null, $motivoEstatus = null)
    {
        $email = new MailProyectosController();
        $userMail = User::find($userIdTo);
        $dataMail = [
            'nro' => $proyecto->nro_planilla,
            'nombre' => $proyecto->nombre_proyecto,
            'institucion' => $proyecto->institucion->nombre,
            'jefe_proyecto' => $proyecto->jefe_proyecto,
            'costo_total' => $proyecto->costo_total_proyecto,
            'mensaje' => $contenidoMail,
            'idEstatus' => $idEstatus,
            'motivo' => $motivoEstatus,
        ];

        $mail = $email->mailProyecto($userMail->email, $tituloMail, $dataMail, $vistaMail);

        if ($mail) {
            $notification = new NotificacionController();
            $dataNotification = [
                'user_id' => $userIdTo,
                'titulo' => $tituloMail,
                'contenido' => $contenidoMail,
                'tipo' => 'Proyectos',
                'visto' => false,
            ];
            $resp = $notification->store($dataNotification);
            return true;
        } else {
            return false;
        }
    }

    public function updateStatus($id, $estatus)
    {
        $proyecto = Proyecto::find($id);

        switch ($estatus) {
            case 'revisar':
                $newEstatus = Estatus::find(2);
                $motivo = 'Revisado exitosamente';
                $subject = 'Planilla de Proyecto ' . $proyecto->nro_solicitud . ' Revisada';
                $mensaje = 'Estimado ciudadano, La planilla de proyecto N°:' . $proyecto->nro_planilla . ' registrada en el Sistema de Gestión de Proyectos 5to Vertice ha sido revisada exitosamente.';
                $view = 'emails.proyectos.revision';
                $messageFlash = 'Planilla revisada exitosamente';
                break;
            case 'devolver-revisor':
                $newEstatus = Estatus::find(3);
                $motivo = $_GET['motivo'];
                $subject = 'Planilla de Proyecto ' . $proyecto->nro_solicitud . ' Devuelta';
                $mensaje = 'Estimado ciudadano, La planilla de proyecto N°:' . $proyecto->nro_planilla . ' registrada en el Sistema de Gestión de Proyectos 5to Vertice ha sido Devuelta.';
                $view = 'emails.proyectos.revision';
                $messageFlash = 'Planilla devuelta exitosamente';
                break;
            case 'aprobar':
                $newEstatus = Estatus::find(4);
                $motivo = 'Aprobado exitosamente';
                $subject = 'Planilla de Proyecto ' . $proyecto->nro_solicitud . ' Aprobada';
                $mensaje = 'Estimado ciudadano, La planilla de proyecto N°:' . $proyecto->nro_planilla . ' registrada en el Sistema de Gestión de Proyectos 5to Vertice ha sido Aprobada exitosamente.';
                $view = 'emails.proyectos.revision';
                $messageFlash = 'Planilla aprobada exitosamente';
                break;
            case 'devolver-aprobador':
                $newEstatus = Estatus::find(5);
                $motivo = $_GET['motivo'];
                $subject = 'Planilla de Proyecto ' . $proyecto->nro_solicitud . ' Devuelta';
                $mensaje = 'Estimado ciudadano, La planilla de proyecto N°:' . $proyecto->nro_planilla . ' registrada en el Sistema de Gestión de Proyectos 5to Vertice ha sido Devuelta.';
                $view = 'emails.proyectos.revision';
                $messageFlash = 'Planilla devuelta exitosamente';
                break;
        }

        $proyecto->estatus_id = $newEstatus->id;
        $proyecto->update();

        HistoricoProyecto::create([
            'user_id' => auth()->user()->id,
            'proyecto_id' => $id,
            'accion' => $newEstatus->nombre,
            'motivo' => $motivo,
        ]);
        $email = $this->SendMail($proyecto->user_id, $proyecto, $subject, $mensaje, $view, $newEstatus->id);
        Flash::success($messageFlash);
        return redirect()->route('proyectos.index');
    }
}
