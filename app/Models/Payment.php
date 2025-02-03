<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['user_crew_id', 'amount', 'status'];

    public function userCrew()
    {
        return $this->belongsTo(UserCrew::class, 'user_crew_id');
    }
}
