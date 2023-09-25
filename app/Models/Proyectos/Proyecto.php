<?php

namespace App\Models\Proyectos;

use App\Models\Publico\Estatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Publico\Institucion;
use App\Models\Taxonomia\Origen;
use App\Models\Taxonomia\Funcion;
use App\Models\Taxonomia\TipoInvestigacion;
use App\Models\Taxonomia\Participacion;
use App\Models\Taxonomia\CadenciaInvestigativa;
use App\Models\Taxonomia\TipoDesarrollo;
use App\Models\Taxonomia\FinInvestigacion;
use App\Models\Taxonomia\TipoActividad;
use App\Models\Taxonomia\LineaInvestigacion;
use App\Models\User;

class Proyecto extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $connection = 'pgsql_proyectos_schema';
    public $table = 'proyectos';

    protected $fillable = [
        'institucion_id',
        'nro_planilla',
        'nombre_proyecto',
        'tiempo_ejecucion',
        'ano_ejecucion',
        'metas_ano_actual',
        'informacion_interes',
        'jefe_proyecto',
        'origen_id',
        'funcion_id',
        'tipo_investigacion_id',
        'participacion_id',
        'cadencia_investigativa_id',
        'tipo_desarrollo_id',
        'fin_investigacion_id',
        'tipo_actividad_id',
        'linea_investigacion_id',
        'porcentaje_ejecucion_fisica',
        'costo_total_proyecto',
        'costo_transnacional',
        'ahorro_nacion',
        'victoria_temprana',
        'nudo_critico',
        'persona_contacto',
        'estatus_id',
        'user_id'
    ];

    protected $casts = [
        'id' => 'integer',
        'institucion_id' => 'integer',
        'porcentaje_ejecucion_fisica' => 'decimal:2',
        'costo_total_proyecto' => 'decimal:2',
        'costo_transnacional' => 'decimal:2',
        'ahorro_nacion' => 'decimal:2',
    ];

    public static $rules = [
        'institucion_id' => 'required|integer',
        'nro_planilla' => 'required|string',
        'nombre_proyecto' => 'required|string',
        'tiempo_ejecucion' => 'required|string',
        'ano_ejecucion' => 'required|string',
        'metas_ano_actual' => 'required|string',
        'informacion_interes' => 'nullable|string',
        'jefe_proyecto' => 'required|string',
        'origen_id' => 'required|integer',
        'funcion_id' => 'required|integer',
        'tipo_investigacion_id' => 'required|integer',
        'participacion_id' => 'required|integer',
        'cadencia_investigativa_id' => 'required|integer',
        'tipo_desarrollo_id' => 'required|integer',
        'fin_investigacion_id' => 'required|integer',
        'tipo_actividad_id' => 'required|integer',
        'linea_investigacion_id' => 'required|integer',
        'porcentaje_ejecucion_fisica' => 'nullable|numeric|between:0,100',
        'costo_total_proyecto' => 'required|numeric|min:0',
        'costo_transnacional' => 'nullable|numeric|min:0',
        'ahorro_nacion' => 'nullable|numeric|min:0',
        'victoria_temprana' => 'nullable|string',
        'nudo_critico' => 'nullable|string',
        'persona_contacto' => 'required|string',
        'user_id' => 'required|integer'
    ];

    // Relación con Institucion
    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    // Relación con Origen
    public function origen()
    {
        return $this->belongsTo(Origen::class, 'origen_id');
    }

    // Relación con Funcion
    public function funcion()
    {
        return $this->belongsTo(Funcion::class, 'funcion_id');
    }

    // Relación con TipoInvestigacion
    public function tipoInvestigacion()
    {
        return $this->belongsTo(TipoInvestigacion::class, 'tipo_investigacion_id');
    }

    // Relación con Participacion
    public function participacion()
    {
        return $this->belongsTo(Participacion::class, 'participacion_id');
    }

    // Relación con CadenciaInvestigativa
    public function cadenciaInvestigativa()
    {
        return $this->belongsTo(CadenciaInvestigativa::class, 'cadencia_investigativa_id');
    }

    // Relación con TipoDesarrollo
    public function tipoDesarrollo()
    {
        return $this->belongsTo(TipoDesarrollo::class, 'tipo_desarrollo_id');
    }

    // Relación con FinInvestigacion
    public function finInvestigacion()
    {
        return $this->belongsTo(FinInvestigacion::class, 'fin_investigacion_id');
    }

    // Relación con TipoActividad
    public function tipoActividad()
    {
        return $this->belongsTo(TipoActividad::class, 'tipo_actividad_id');
    }

    // Relación con LineaInvestigacion
    public function lineaInvestigacion()
    {
        return $this->belongsTo(LineaInvestigacion::class, 'linea_investigacion_id');
    }

    // Relación con User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function estatus()
    {
        return $this->belongsTo(Estatus::class, 'estatus_id');
    }

}