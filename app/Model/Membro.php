<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    protected $fillable = [
        'name', 
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
        'cargo',
        'data_conversao',
        'batizado',
        'afastado',
    ];
}
