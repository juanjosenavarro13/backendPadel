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

    public function getRoles()
    {
        $roles = Rol::all();
        return response()->json($roles);
    }

    public function delete($id)
    {
        $rol = Rol::find($id);
        $rol->delete();
        return response()->json(['success' => 'Rol eliminado correctamente.']);
    }

    public function edit(Request $request)
    {
        $rol = Rol::find($request->id);
        $rol->nombre = $request->nombre;
        $rol->nivel = $request->nivel;
        $rol->save();
        return response()->json(['success' => 'Rol editado correctamente.']);
    }
}
