<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomeacoes
 * @package App\Models
 * @version April 16, 2022, 9:53 pm UTC
 *
 * @property integer $membro_id
 * @property integer $cargo_id
 * @property string $inicio_mandato
 * @property string $termino_mandato
 * @property string $status
 */
class Nomeacoes extends Model
{
    use SoftDeletes;

    public $table = 'nomeacoes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'membro_id',
        'cargo_id',
        'inicio_mandato',
        'termino_mandato',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'membro_id' => 'integer',
        'cargo_id' => 'integer',
        'inicio_mandato' => 'string',
        'termino_mandato' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'membro_id' => 'required',
        'cargo_id' => 'required',
    ];


}
