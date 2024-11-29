<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\User;
use App\Models\User_crew_join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCrewJoinController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        // Obtener las solicitudes de unión del usuario
        $joinRequests = User_crew_join::where('user_id', $user->id)
                                           ->with('crew') 
                                           ->get();

        return view('userJoinRequests')->with('joinRequests', $joinRequests);
    }

    public function joinCrew(Request $request, $id)
    {
        $user = Auth::user(); 
        $crew = Crew::findOrFail($id);

        // Verificar si el usuario ya ha enviado una solicitud para este crew
        $existingRequest = User_crew_join::where('user_id', $user->id)
                                              ->where('crew_id', $crew->id)
                                              ->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'Ya has enviado una solicitud a este crew.');
        }

        // Crear una nueva solicitud de unión
        User_crew_join::create([
            'user_id' => $user->id,
            'crew_id' => $crew->id,
            'status' => 'pending',  // La solicitud comienza como pendiente
        ]);

        return redirect()->back()->with('success', 'Solicitud enviada correctamente.');
    }

}
