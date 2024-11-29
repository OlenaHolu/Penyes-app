<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $this->authorizeAdmin();
        $users = User::all();
        return view('users', compact('users'));
    }

    // Buscar usuarios
    public function search(Request $request)
    {
        $this->authorizeAdmin();
        $query = $request->input('query');
        $searchResults = User::where('name', 'like', '%' . $query . '%')->get();
        return view('search-results')->with('searchResults', $searchResults);
    }

    // Mostrar formulario para editar un usuario específico
    public function edit($id)
    {
        $this->authorizeAdmin();
        $user = User::findOrFail($id);
        return view('user_edit', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255', // Validación para apellido
            'bornDay' => 'required|date', // Validación para fecha de nacimiento
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        $this->authorizeAdmin();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    // Método privado para verificar si el usuario es admin
    private function authorizeAdmin()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }
    }

    public function create()
    {
        return view('userCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'bornDay' => 'required|date', 
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname, 
            'bornDay' => $request->bornDay, 
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }
}
