<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Pricing;
use App\Models\UserCrew;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function create()
{
    $user = Auth::user();

    // Get the Crew IDs where the user has an "approved" status
    $crewIds = UserCrew::where('user_id', $user->id)
        ->where('status', 'approved')
        ->pluck('crew_id');

    $paidPricingIds = Payment::where('user_id', $user->id)
        ->where('status', 'PAID')
        ->pluck('pricing_id');

    // EXCLUDING already paid
    $pricingOptions = Pricing::whereIn('crew_id', $crewIds)
        ->where('year', date('Y'))
        ->whereNotIn('id', $paidPricingIds) 
        ->get();

    return view('user.payments.create', compact('pricingOptions'));
}


    public function store(Request $request)
    {
        $request->validate([
            'pricing_id' => 'required|exists:pricings,id'
        ]);

        $pricing = Pricing::findOrFail($request->pricing_id);
        $user = Auth::user();

        Payment::create([
            'user_id' => $user->id,
            'pricing_id' => $pricing->id,
            'status' => 'PAID', 
        ]);

        return redirect()->route('payments.success')->with('success', 'Pago realizado con éxito.');
    }

    public function success()
    {
        return view('user.payments.success');
    }

    public function showAdminView()
    {
        $payments = Payment::all();
        return view('admin.payments.index', compact('payments'));
    }
}
