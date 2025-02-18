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
    
    public function index()
{
    $user = Auth::user();

    // ✅ Retrieve only this user's payments (Eager load pricing & crew)
    $payments = Payment::where('user_id', $user->id)
        ->with(['pricing.crew'])
        ->get();

    // ✅ Get the Crew IDs where the user has an "approved" status
    $crewIds = UserCrew::where('user_id', $user->id)
        ->where('status', 'approved')
        ->pluck('crew_id');

    // ✅ Get IDs of already paid pricing options
    $paidPricingIds = Payment::where('user_id', $user->id)
        ->where('status', 'PAID')
        ->pluck('pricing_id');

    // ✅ Get unpaid pricing options for the current year
    $pricingOptions = Pricing::whereIn('crew_id', $crewIds)
        ->where('year', date('Y'))
        ->whereNotIn('id', $paidPricingIds) // Exclude already paid options
        ->get();

    return view('user.payments.payments', compact('payments', 'pricingOptions'));
}

public function store(Request $request)
{
    $user = Auth::user();
    $pricing = Pricing::findOrFail($request->pricing_id);
    $wallet = $user->wallet;

    // ✅ Check if wallet exists and has enough balance
    if (!$wallet || $wallet->balance < $pricing->amount) {
        return redirect()->back()->with('error', 'Saldo insuficiente en el monedero.');
    }

    // ✅ Deduct payment from wallet balance
    $wallet->balance -= $pricing->amount;
    $wallet->save();

    // ✅ Create payment record
    Payment::create([
        'user_id' => $user->id,
        'pricing_id' => $pricing->id,
        'status' => 'PAID',
        'expiration_date' => now()->endOfYear(),
    ]);

    return redirect()->back()->with('success', 'Pago realizado con éxito.');
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
