<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partido;
use App\Models\Usuario;

class PartidoController extends Controller
{
    public function getPartidosByDate($fecha)
    {

        $partidos = Partido::select('partidos.*')
            ->where('fecha', 'like', $fecha . '%')->get();

        foreach ($partidos as $partido) {
            $partido->jugador1 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador1)->first();
            $partido->jugador2 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador2)->first();
            $partido->jugador3 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador3)->first();
            $partido->jugador4 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador4)->first();
        }

        return response()->json($partidos, 200);
    }

    public function getPartidosSemana($fecha)
    {

        $fechaInicio = date('Y-m-d', strtotime('monday this week', strtotime($fecha)));
        $fechaFin = date('Y-m-d', strtotime($fechaInicio . ' + 7 days'));

        $partidos = Partido::select('partidos.*')
            ->whereBetween('fecha', [$fechaInicio, $fechaFin])
            ->orderBy('fecha', 'asc')
            ->get();

        foreach ($partidos as $partido) {
            $partido->jugador1 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador1)->first();
            $partido->jugador2 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador2)->first();
            $partido->jugador3 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador3)->first();
            $partido->jugador4 = Usuario::select('usuarios.*')
                ->where('id', $partido->id_jugador4)->first();
        }


        return response()->json($partidos, 200);
    }
}
