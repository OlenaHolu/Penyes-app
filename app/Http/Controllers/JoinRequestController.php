<?php

namespace App\Http\Controllers;

use App\Models\UserCrewJoin;
use Illuminate\Http\Request;

class JoinRequestController extends Controller
{
    /**
     * Mostrar las solicitudes de unión del usuario.
     */
    public function index()
    {
        $joinRequests = UserCrewJoin::with('crew', 'user') // Cargar los datos de los usuarios y crews
                                          ->where('status', 'pending')  // Solo las solicitudes pendientes
                                          ->get();
                                          
        return view('admin.join-requests')->with('joinRequests', $joinRequests);
    }

    /**
     * Aprobar una solicitud de unión.
     */
    public function approve($id)
    {
        $request = UserCrewJoin::findOrFail($id);
        
        // Cambiar el estado de la solicitud a "approved"
        $request->status = 'approved';
        $request->save();
        
        return redirect('/adminJoinRequests')->with('success', 'Solicitud aprobada correctamente.');

    }

    /**
     * Rechazar una solicitud de unión.
     */
    public function reject($id)
    {
        $request = UserCrewJoin::findOrFail($id);

        // Cambiar el estado de la solicitud a "rejected"
        $request->status = 'rejected';
        $request->save();

        return redirect('/adminJoinRequests')->with('error', 'Solicitud rechazada.');
    }
}
