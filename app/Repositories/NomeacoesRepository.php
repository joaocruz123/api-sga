<?php

namespace App\Repositories;

use App\Models\Nomeacoes;
use App\Repositories\BaseRepository;

/**
 * Class NomeacoesRepository
 * @package App\Repositories
 * @version April 16, 2022, 7:21 pm UTC
*/

class NomeacoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'membro_id',
        'cargo_id'
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
        return Nomeacoes::class;
    }
}
