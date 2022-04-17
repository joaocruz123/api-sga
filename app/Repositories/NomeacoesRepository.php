<?php

namespace App\Repositories;

use App\Models\Nomeacoes;
use App\Repositories\BaseRepository;

/**
 * Class NomeacoesRepository
 * @package App\Repositories
 * @version April 16, 2022, 9:53 pm UTC
*/

class NomeacoesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'membro_id',
        'cargo_id',
        'inicio_mandato',
        'termino_mandato',
        'status'
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
