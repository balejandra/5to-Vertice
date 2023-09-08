<?php

namespace App\Repositories\Publico;


use App\Models\Publico\Institucion;
use App\Repositories\BaseRepository;

/**
 * Class InstitucionRepository
 * @package App\Repositories
 * @version January 19, 2022, 11:00 pm UTC
*/

class InstitucionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nombre',
        'sigla',
        'sector_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Institucion::class;
    }
}
