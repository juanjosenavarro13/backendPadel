<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;
use Illuminate\Support\Facades\Validator;

class PistaController extends Controller
{
    public function getPistas()
    {
        $pistas = Pista::all();
        return response()->json($pistas);
    }

    public function getPistaById($id)
    {
        $pista = Pista::find($id);
        if ($pista) {
            return response()->json($pista);
        } else {
            return response()->json("Pista no encontrada", 404);
        }
    }

    public function updatePista(Request $request, $id)
    {
        $pista = Pista::find($id);
        if ($pista) {
            $pista->nombre = $request->nombre;
            $pista->save();
            return response()->json($pista, 200);
        } else {
            return response()->json("Pista no encontrada", 404);
        }
    }

    public function deletePista($id)
    {
        $pista = Pista::find($id);
        if ($pista) {
            $pista->delete();
            return response()->json("Pista eliminada", 200);
        } else {
            return response()->json("Pista no encontrada", 404);
        }
    }

    public function createPista(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $pista = Pista::create($request->all());
        return response()->json($pista, 201);
    }
}
