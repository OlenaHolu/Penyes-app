<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrewController extends Controller
{
    // Mostrar todos crews
    public function index()
    {
        $this->authorizeAdmin();
        $crews = Crew::all();
        return view('crews')->with('crews', $crews);
    }

    // Buscar crews
    public function search(Request $request)
    {
        $this->authorizeAdmin();
        $query = $request->input('query');
        $searchResults = Crew::where('name', 'like', '%' . $query . '%')->get();
        return view('search-results')->with('searchResults', $searchResults);
    }

    // Mostrar formulario para editar un usuario específico
    public function edit($id)
    {
        $this->authorizeAdmin();
        $user = Crew::findOrFail($id);
        return view('user_edit', compact('user'));
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $user = Crew::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
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

    // Eliminar crew
    public function destroy($id)
    {
        $this->authorizeAdmin();

        $crew = Crew::findOrFail($id);
        $crew->delete();

        return redirect()->route('crews.index')->with('success', 'Crew eliminado exitosamente.');
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
        return view('crewCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|numeric|digits:4',
            'slogan'=> 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        Crew::create([
            'name' => $request->name,
            'year' => $request->year,
            'slogan' => $request->slogan,
            'color' => $request->color,
            'platform_id' => null
        ]);

        return redirect()->route('crews.index')->with('success', 'Crew creado correctamente.');
    }
}
