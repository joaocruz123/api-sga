<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomeacao
 * @package App\Models
 * @version May 18, 2021, 6:14 am UTC
 *
 * @property \App\Models\Membros $id
 * @property \App\Models\Cargos $cargo
 * @property status string text
 * @property integer $membro_id
 * @property integer $cargo_id
 * @property string $inicio_mandato
 * @property string $termino_mandato
 * @property string $status
 */
class Nomeacao extends Model
{
    use SoftDeletes;

    public $table = 'nomeacaos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'membro_id',
        'cargo_id',
        'inicio_mandato',
        'termino_mandato',
        'status'
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
        'cargo_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function membro()
    {
        return $this->belongsTo(\App\Models\Membros::class,'membro_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cargo()
    {
        return $this->belongsTo(\App\Models\Cargos::class, 'cargo_id', 'id');
    }
}
