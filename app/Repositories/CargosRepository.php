<?php

namespace App\Repositories;

use App\Models\Cargos;
use App\Repositories\BaseRepository;

/**
 * Class CargosRepository
 * @package App\Repositories
 * @version May 16, 2021, 7:30 pm UTC
*/

class CargosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'descricao',
        'ativo'
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
        return Cargos::class;
    }
}
