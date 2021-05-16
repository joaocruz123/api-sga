<?php

namespace App\Repositories;

use App\Models\Membros;
use App\Repositories\BaseRepository;

/**
 * Class MembrosRepository
 * @package App\Repositories
 * @version May 16, 2021, 8:18 pm UTC
*/

class MembrosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'email',
        'cpf',
        'sexo',
        'telefone',
        'celular',
        'data_nascimento',
        'estado_civil',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'estado',
        'profissao',
        'endereco_trabalho',
        'atuacao',
        'data_conversao',
        'batizado',
        'afastado'
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
        return Membros::class;
    }
}
