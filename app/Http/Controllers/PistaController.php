<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pista;

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
}
