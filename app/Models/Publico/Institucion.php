<?php

namespace App\Models\Publico;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Institucion
 * @package App\Models
 * @version January 19, 2022, 11:00 pm UTC
 */
class Institucion extends Model implements Auditable
{
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $connection = 'pgsql_public_schema';
    public $table = 'instituciones';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'nombre',
        'sigla',
        'sector_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'sigla' => 'string',
        'sector_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'required',
        'sigla' => 'required',
        'sector_id' => 'required'
    ];

    /*public function capitan(){
        return $this->hasMany(CapitaniaUser::class,'capitania_user','capitania_id','id');
    }*/
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}