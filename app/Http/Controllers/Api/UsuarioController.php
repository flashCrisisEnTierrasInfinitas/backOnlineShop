<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $user = Usuario::all();
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $user = new Usuario();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = $request->status;
        // Guardar el usuario en la base de datos
        $user->save();

        // Devolver una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'success']);
    }

    public function show($id)
    {
        $user = Usuario::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = Usuario::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->status = $request->status;
        // Guardar el usuario en la base de datos
        $user->save();

        return response()->json(['message' => 'Update','data'=>$user]);
    }

    public function destroy($id)
    {
        $user = Usuario::destroy($id);
        return response()->json(['message' => 'Delete','data' => $user]);
    }
}
