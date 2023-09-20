<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\updateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::all();
         return view('admin/users.index', compact('users'));
    }

   
    public function create()
    {
        return view('admin/users.create');
    }

    public function store(StoreUserRequest $request)
    {
        // Validar los datos ingresados por el usuario
        $user = $request->validated();
        $user['password'] = Hash::make($request->password);
        // Crear un nuevo usuario con los datos validados
        $user = User::create($user);
        // Redirigir a la vista de lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('message', 'User create successfully.');
    }

    public function show(User $user)
    {
        // $user = User::find($user);
        return view('admin/users.show', compact('user'));
        
    }

    public function edit(User $user)
    {
        return view('admin/users.edit', compact('user'));
    }

    public function update(updateUserRequest $request, User $user)
    {
        // Validar los datos ingresados por el usuario
        $userData = $request->validated();
        
        if ($request->has('password')) {
            $userData['password'] = Hash::make($request->password); // Hash de la nueva contraseña
        }
        // Actualizar los datos del usuario con los datos validados
        $user->update($userData);

        // Redirigir a la vista de lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('message', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('message', 'User deleted successfully.');
        } else {
            return redirect()->route('admin.users.index')->with('message', 'User does not exist or has already been deleted.');
        }
    }
}
