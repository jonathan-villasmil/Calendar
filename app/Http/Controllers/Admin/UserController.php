<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users.index', compact('users'));


        //return view('admin/users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos ingresados por el usuario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Crear un nuevo usuario con los datos validados
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')), // Hash de la contraseña
        ]);

        // Guardar el usuario en la base de datos
        $user->save();

        // Redirigir a la vista de lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('success', 'User create successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = User::find('id');
        return view('admin/users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin/users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validar los datos ingresados por el usuario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, // Excluir la dirección de correo electrónico actual del proceso de validación
            'password' => 'nullable|string|min:6', // La contraseña es opcional en la actualización
        ]);

        // Actualizar los datos del usuario con los datos validados
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Verificar si se proporcionó una nueva contraseña
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password')); // Hash de la nueva contraseña
        }

        // Guardar los cambios en el usuario
        $user->save();

        // Redirigir a la vista de lista de usuarios con un mensaje de éxito
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('admin.users.index')->with('error', 'User does not exist or has already been deleted.');
        }
    }
}
