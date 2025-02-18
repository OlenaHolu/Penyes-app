<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    // Show the wallet
    public function index()
{
   
    $wallet = Auth::user()->wallet;

    if (!$wallet) {
        $wallet = Wallet::create([
            'user_id' => Auth::id(),
            'balance' => 0,
        ]);
    }

    return view('user.wallet', compact('wallet'));
}

    // Deposit money
    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $wallet = Auth::user()->wallet ?? Wallet::create([
            'user_id' => Auth::id(),
            'balance' => 0,
        ]);

        $wallet->deposit($request->amount);

        return redirect()->back()->with('success', 'Deposited successfully.');
    }

    // Use wallet balance to pay
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $wallet = Auth::user()->wallet;

        if (!$wallet || !$wallet->pay($request->amount)) {
            return redirect()->back()->with('error', 'Insufficient balance.');
        }

        return redirect()->back()->with('success', 'Payment successful.');
    }
}
