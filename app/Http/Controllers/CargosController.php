<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Cargo;
use Illuminate\Support\Facades\Validator;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::all();
        return response()->json($cargos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()
            ], 422);
        }

        $cargo = new Cargo();
        $cargo->fill($request->all());
        $cargo->save();

        return response()->json($cargo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cargo = Cargo::find($id);

        if(!$cargo) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return response()->json($cargo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request);

        if($validator->fails() ) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()
            ], 422);
        }
        
        $cargo = Cargo::find($id);

        if(!$cargo) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $cargo->fill($request->all());
        $cargo->save();

        return response()->json($cargo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cargo = Cargo::find($id);

        if(!$cargo) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $cargo->delete();
    }

    protected function validator($request) {
        $validator = Validator::make($request->all(), [
            'nome' =>               'required|string',
            'descricao' =>          'nullable|string',
            'ativo' =>              'required|integer',
        ]);
    
        return $validator;
    }
}
