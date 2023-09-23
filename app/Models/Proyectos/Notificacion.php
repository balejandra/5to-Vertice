<?php

namespace App\Models\Proyectos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

class Notificacion extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql_proyectos_schema';
    public $table = 'notificaciones';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'titulo',
        'contenido',
        'tipo',
    ];


    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'contenido' => 'string',
        'tipo' => 'string',
        'visto' => 'boolean',
    ];


    public static $rules = [
        'user_id' => 'required|integer',
        'titulo' => 'required|string',
        'contenido' => 'required|string',
        'tipo' => 'required|string',
        'visto' => 'required|boolean',

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