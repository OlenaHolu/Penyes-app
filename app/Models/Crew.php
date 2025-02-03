<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    // Relación con solicitudes de unión
    public function joinRequests()
    {
        return $this->hasMany(UserCrewJoin::class);
    }

    // Eliminar las solicitudes asociadas antes de eliminar la crew
    protected static function booted()
    {
        static::deleting(function ($crew) {
            // Elimina las solicitudes de unión asociadas
            $crew->joinRequests()->delete();
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
