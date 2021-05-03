<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Membro;

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
        $membro = new Membro();
        $membro->fill($request->all());
        $membro->save();

        return response()->json($membro, 201);
    }

    public function update(Request $request, $id)
    {
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
}
