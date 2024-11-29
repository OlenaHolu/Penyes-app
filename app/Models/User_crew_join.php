<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_crew_join extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'crew_id', 'status'];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Crew
    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
