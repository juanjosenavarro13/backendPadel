<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;
use Illuminate\Support\Facades\Validator;

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

    public function createRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'nivel' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $rol = new Rol();
        $rol->nombre = $request->nombre;
        $rol->nivel = $request->nivel;
        $rol->save();
        return response()->json(['success' => 'Rol creado correctamente.']);
    }
}
