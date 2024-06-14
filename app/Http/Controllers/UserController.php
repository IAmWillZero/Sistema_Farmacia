<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Asegúrate de importar el modelo User
use App\Models\Role;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('admin.users.list_users', compact('users'));
    }

    public function create()
    {
        // Obtener todos los roles disponibles
        $roles = Role::all(); // Asumiendo que tienes un modelo Role para los roles

    // Retornar la vista con los roles
        return view('admin.users.create_user', compact('roles'));
    }

    public function store(Request $request)
    {
        // Lógica para almacenar un nuevo usuario
        // Por ejemplo:
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            // Otros campos según tu estructura de base de datos
        ]);

        return redirect()->route('admin.users.list_users')->with('success', 'Usuario creado correctamente');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Obtener el usuario por su ID
        return view('admin.users.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar el usuario con ID específico
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Actualiza otros campos según sea necesario
        ]);

        return redirect()->route('admin.users.list_users')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy($id)
    {
        // Lógica para eliminar un usuario por su ID
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.list_users')->with('success', 'Usuario eliminado correctamente');
    }

    public function showProfile($id)
    {
        $user = User::findOrFail($id); // Obtener el usuario por su ID para mostrar su perfil
        return view('admin.users.user_profile', compact('user'));
    }
}
