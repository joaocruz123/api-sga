<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Membro;
use Illuminate\Support\Facades\Validator;

class MembrosController extends Controller
{
    public function index()
    {
        $membros = Membro::all();
        return response()->json($membros);
    }

    public function show($id)
    {
        $membro = Membro::find($id);

        if(!$membro) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($membro);
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()
            ], 422);
        }

        $membro = new Membro();
        $membro->fill($request->all());
        $membro->save();

        return response()->json($membro, 201);
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()
            ], 422);
        }
        
        $membro = Membro::find($id);

        if(!$membro) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $membro->fill($request->all());
        $membro->save();

        return response()->json($membro);
    }

    public function destroy($id)
    {
        $membro = Membro::find($id);

        if(!$membro) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $membro->delete();
    }

    protected function validator($request) {
        $validator = Validator::make($request->all(), [
            'nome' =>               'required|string',
            'email' =>              'required|string|email',
            'cpf' =>                'required|integer',
            'sexo' =>               'nullable|string',
            'telefone' =>           'nullable|integer',
            'celular' =>            'nullable|integer',
            'data_nascimento' =>    'nullable|string',
            'cep' =>                'nullable|string',
            'endereco' =>           'nullable|string',
            'bairro' =>             'nullable|string',
            'numero' =>             'nullable|string',
            'complemento' =>        'nullable|string',
            'cidade' =>             'nullable|string',
            'estado' =>             'nullable|string',
            'profissao' =>          'nullable|string',
            'endereco_trabalho' =>  'nullable|string',
            'cargo' =>              'nullable|string',
            'data_conversao' =>     'nullable|string',
            'batizado' =>           'nullable|string',
            'afastado' =>           'nullable|string'
        ]);
    
        return $validator;
    }
}
