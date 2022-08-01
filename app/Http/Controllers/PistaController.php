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
}
