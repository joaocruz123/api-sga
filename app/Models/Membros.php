<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Membros
 * @package App\Models
 * @version May 16, 2021, 8:18 pm UTC
 *
 * @property string $nome
 * @property string $email
 * @property string $cpf
 * @property string $sexo
 * @property string $telefone
 * @property string $celular
 * @property string $data_nascimento
 * @property string $estado_civil
 * @property string $cep
 * @property string $endereco
 * @property string $bairro
 * @property string $numero
 * @property string $complemento
 * @property string $cidade
 * @property string $estado
 * @property string $profissao
 * @property string $endereco_trabalho
 * @property string $atuacao
 * @property string $data_conversao
 * @property string $batizado
 * @property string $afastado
 */
class Membros extends Model
{
    use SoftDeletes;

    public $table = 'membros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'afastado',
        'avatar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'email' => 'string',
        'cpf' => 'string',
        'sexo' => 'string',
        'telefone' => 'string',
        'celular' => 'string',
        'data_nascimento' => 'string',
        'estado_civil' => 'string',
        'cep' => 'string',
        'endereco' => 'string',
        'bairro' => 'string',
        'numero' => 'string',
        'complemento' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
        'profissao' => 'string',
        'endereco_trabalho' => 'string',
        'atuacao' => 'string',
        'data_conversao' => 'string',
        'batizado' => 'string',
        'afastado' => 'string',
        'avatar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'email' => 'required',
        'cpf' => 'required',
    ];

    
}
