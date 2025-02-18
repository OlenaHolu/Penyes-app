<?php

namespace App\Http\Controllers;

use App\Models\UserCrew;
use Illuminate\Http\Request;

class JoinRequestController extends Controller
{
    public function index()
    {
        $joinRequests = UserCrew::with('crew', 'user') 
                                          ->where('status', 'pending')
                                          ->get();
                                          
        return view('admin.join-requests')->with('joinRequests', $joinRequests);
    }

    public function approve($id)
{
    $request = UserCrew::findOrFail($id);
    $userId = $request->user_id;

    UserCrew::where('user_id', $userId)
            ->where('status', 'pending') 
            ->update(['status' => 'rejected']);

    $request->status = 'approved';
    $request->save();

    return redirect('/adminJoinRequests')->with('success', 'Solicitud aprobada y otras solicitudes del usuario rechazadas.');
}


    public function reject($id)
    {
        $request = UserCrew::findOrFail($id);

        $request->status = 'rejected';
        $request->save();

        return redirect('/adminJoinRequests')->with('error', 'Solicitud rechazada.');
    }
}
