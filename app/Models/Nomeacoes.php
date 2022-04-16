<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomeacoes
 * @package App\Models
 * @version April 16, 2022, 7:21 pm UTC
 *
 * @property integer $membro_id
 * @property integer $cargo_id
 */
class Nomeacoes extends Model
{
    use SoftDeletes;

    public $table = 'nomeacoes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'membro_id',
        'cargo_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'membro_id' => 'integer',
        'cargo_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
