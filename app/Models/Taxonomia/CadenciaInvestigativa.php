<?php

namespace App\Models\Taxonomia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class CadenciaInvestigativa
 * @package App\Models\Taxonomia
 * @version September 6, 2023, 3:00 pm UTC
 *
 * @property string $nombre
 */
class CadenciaInvestigativa extends Model implements Auditable
{
    use SoftDeletes;
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $connection = 'pgsql_taxonomia_schema';
    public $table = 'cadencias_investigativas';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre'
    ];

    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required'
    ];
}
