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
}
