<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    public function userCrews()
    {
        return $this->hasMany(UserCrew::class);
    }

    protected static function booted()
    {
        static::deleting(function ($crew) {
            $crew->userCrews()->delete();
        });
    }

    protected $fillable = [
        'name',
        'year',
        'slogan',
        'color',
        'platform_id'
    ];
}
