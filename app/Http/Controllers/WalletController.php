<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function getWalletContent()
{
    $wallet = Auth::user()->wallet ?? new Wallet(['balance' => 0]);

    return view('components.wallet-content', compact('wallet'))->render();
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

    $wallet->balance += $request->amount;
    $wallet->save();

    return response()->json([
        'success' => true,
        'new_balance' => number_format($wallet->balance, 2) . " EUR",
    ]);
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
