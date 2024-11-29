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
            ['email' => 'admin@admin.com'], 
            [
                'name' => 'admin',
                'surname' => 'admin',
                'bornDay' => '2000-01-20',
                'password' => 'admin', 
                'role_id' => $adminRole->id,
            ]
        );
    }
}
