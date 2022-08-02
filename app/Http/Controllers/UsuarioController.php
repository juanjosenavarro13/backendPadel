<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        $usuario = Usuario::where('email', $credentials['email'])->first();
        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }
        if ($usuario->activo === 0) {
            return response()->json(['error' => 'Usuario no activo'], 401);
        }

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:usuarios',
            'nombre' => 'required|string',
            'password' => 'required|string|confirmed|min:6',
            'apellidos' => 'string|nullable',
            'telefono' => 'string|min:9|nullable',
            'direccion' => 'string|nullable',
            'fecha_nacimiento' => 'date|nullable',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        } else {
            $user = new Usuario();
            $user->email = $request->email;
            $user->nombre = $request->nombre;
            $user->password = bcrypt($request->password);
            $user->apellidos = $request->apellidos;
            $user->telefono = $request->telefono;
            $user->direccion = $request->direccion;
            $user->fecha_nacimiento = $request->fecha_nacimiento;
            $user->save();

            return response()->json([
                'message' => 'Usuario registrado correctamente',
                'user' => $user
            ], 201);
            // $token = auth()->login($user);
            // return $this->respondWithToken($token);
        }
    }

    public function getUsuarios()
    {
        $usuarios = Usuario::paginate(10);
        return response()->json($usuarios);
    }
}
