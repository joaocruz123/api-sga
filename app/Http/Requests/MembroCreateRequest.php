<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' =>           'required|string',
            'email' =>          'required|string|email',
            'cpf' =>            'required|integer',
            'sexo' =>           'nullable|string',
            'telefone' =>       'nullable|integer',
            'celular' =>        'nullable|integer',
            'data_nascimento' =>'nullable|string',
            'cep' =>            'nullable|string',
            'endereco' =>       'nullable|string',
            'bairro' =>         'nullable|string',
            'numero' =>         'nullable|string',
            'complemento' =>    'nullable|string',
            'cidade' =>         'nullable|string',
            'estado' =>         'nullable|string',
            'profissao' =>      'nullable|string',
            'endereco_trabalho' =>'nullable|string',
            'cargo' =>          'nullable|string',
            'data_conversao' => 'nullable|string',
            'batizado' =>       'nullable|string',
            'afastado' =>       'nullable|string'
        ];
    }

    public function messages(){
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'numeric' => 'O campo :attribute deve ser preenchido com valores numéricos.',
            'min:5' => 'O campo :attribute requer um mínimo de 5 caracteres.',
            'max:500' => 'O campo :attribute não pode exceder 500 caracteres.'
        ];
    }
}
