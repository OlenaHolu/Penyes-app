<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Deposit money into the wallet
    public function deposit($amount)
    {
        $this->balance += $amount;
        $this->save();
    }

    public function balance(){
        return $this->balance();
    }
    // Use money for a payment
    public function pay($amount)
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->save();
            return true; // Payment successful
        }
        return false; // Not enough funds
    }
}
