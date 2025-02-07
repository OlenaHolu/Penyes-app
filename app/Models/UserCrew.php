<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCrew extends Model
{
    use HasFactory;

    protected $table = 'user_crews';

    protected $fillable = ['user_id', 'crew_id', 'year', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_crews_id');
    }
}
