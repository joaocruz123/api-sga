<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargos
 * @package App\Models
 * @version May 16, 2021, 7:30 pm UTC
 *
 * @property string $nome
 * @property string $descricao
 * @property integer $ativo
 */
class Cargos extends Model
{
    use SoftDeletes;

    public $table = 'cargos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'descricao',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'descricao' => 'string',
        'ativo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'ativo' => 'required'
    ];

    
}
