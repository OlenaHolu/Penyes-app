<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    
    {
        // Obtén el rol 'admin'
        $adminRole = Role::where('name', 'admin')->first();

        // Crea el usuario con rol 'admin'
        User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Email del usuario 'admin'
            [
                'name' => 'admin',
                'password' => 'admin', // Contraseña predeterminada
                'role_id' => $adminRole->id,
            ]
        );
    }
}
