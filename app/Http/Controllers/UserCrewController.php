<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\UserCrew;
use App\Models\UserCrewJoin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCrewController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 

        // Obtener las solicitudes de unión del usuario
        $joinRequests = UserCrew::where('user_id', $user->id)
                                           ->with('crew') 
                                           ->get();

        return view('user.join-requests')->with('joinRequests', $joinRequests);
    }

    public function joinCrew(Request $request, $id)
    {
        $user = Auth::user(); 
        $crew = Crew::findOrFail($id);

        $existingRequest = UserCrew::where('user_id', $user->id)
                                              ->where('crew_id', $crew->id)
                                              ->first();

        if ($existingRequest) {
            return redirect()->back()->with('error', 'Ya has enviado una solicitud a este crew.');
        }

        UserCrew::create([
            'user_id' => $user->id,
            'crew_id' => $crew->id,
            'status' => 'pending',  
        ]);

        return redirect()->back()->with('success', 'Solicitud enviada correctamente.');
    }

}
