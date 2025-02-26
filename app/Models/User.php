<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',  
        'bornDay',  
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'bornDay' => 'date',
        ];
    }

    // Relación para obtener el rol del usuario
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Método para verificar si el usuario es admin
    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    // Relación con solicitudes de unión
    public function joinRequests()
    {
        return $this->hasMany(UserCrew::class);
    }

    // Eliminar las solicitudes asociadas antes de eliminar usuario
    protected static function booted()
    {
        static::deleting(function ($user) {
            // Elimina las solicitudes de unión asociadas
            $user->joinRequests()->delete();
        });
    }

    public function wallet(){
        return $this->hasOne(Wallet::class);
    }

}
