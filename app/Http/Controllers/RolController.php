<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function getRolById($id)
    {
        $rol = Rol::where('id', $id)->first();
        return response()->json($rol);
    }
}
