<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Partido;
use App\Models\Pista;
use App\Models\Usuario;
use stdClass;

class ConfigurationController extends Controller
{
    public function index()
    {
        $config = Configuration::first();
        return response()->json($config);
    }

    public function update(Request $request)
    {
        $config = Configuration::first();
        $config->update($request->all());
        return response()->json($config);
    }

    public function stats()
    {
        $stats = new stdClass();
        $stats->jugadores = Usuario::count();
        $stats->pistas = Pista::count();
        $stats->partidos = Partido::count();


        return response()->json($stats, 200);
    }
}
