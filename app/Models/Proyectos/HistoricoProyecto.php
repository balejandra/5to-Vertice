<?php

namespace App\Models\Proyectos;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class HistoricoProyecto extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql_proyectos_schema';
    public $table = 'historico_proyectos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'proyecto_id',
        'accion',
        'motivo'
    ];


    protected $casts = [
        'id' => 'integer',
        'accion' => 'string',
        'motivo' => 'string'
    ];


    public static $rules = [
        'user_id' => 'required',
        'proyecto_id' => 'required',
        'accion' => 'required',
        'motivo' => 'required'

    ];

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class);
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}