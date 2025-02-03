<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\UserCrew;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class UserPaymentController extends Controller
{
    public function create()
    {
        return view('user.payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user(); 
        $userCrew = UserCrew::where('user_id', $user->id)->first();

        if (!$userCrew) {
            return back()->with('error', 'No estás asociado a un Crew.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $request->amount * 100, // Convertir a centavos
            'currency' => 'usd',
            'payment_method_types' => ['card'],
        ]);

        Payment::create([
            'user_crew_id' => $userCrew->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret
        ]);
    }
}
