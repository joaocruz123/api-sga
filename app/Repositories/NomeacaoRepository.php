<?php

namespace App\Repositories;

use App\Models\Nomeacao;
use App\Repositories\BaseRepository;

/**
 * Class NomeacaoRepository
 * @package App\Repositories
 * @version May 18, 2021, 6:14 am UTC
*/

class NomeacaoRepository extends BaseRepository
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
        return Nomeacao::class;
    }
}
