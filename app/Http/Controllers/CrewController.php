<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\User_crew_join;
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
        $query = $request->input('query');
        $searchResults = Crew::where('name', 'like', '%' . $query . '%')->get();
        $isAdmin = Auth::user()->role_id === 1;
        if($isAdmin){
            return view('search.adminSearchResultsCrews')->with('searchResults', $searchResults);
        } else {
            return view('search.userSearchResultsCrews')->with('searchResults', $searchResults);
        }   
    }

    // Mostrar formulario para editar un crew específico
    public function edit($id)
    {
        $this->authorizeAdmin();
        $crew = Crew::findOrFail($id);
        return view('crewEdit')->with('crew', $crew);
    }

    // Actualizar crew
    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $crew = Crew::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|numeric|digits:4',
            'slogan'=> 'required|string|max:255',
            'color' => 'required|string|max:255'
        ]);

        $crew->update($data);

        return redirect()->route('crews.index')->with('success', 'Crew actualizado exitosamente.');
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
    public function showCrewsList(){
        $crews = Crew::all();
        return view('crewsList')->with('crews', $crews);
    }

    public function showCrewInfo($id){
        $crew = Crew::findOrFail($id);
        return view('crewInfo')->with('crew', $crew);
    }
}
