<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Obtén el ID del rol 'user'
            $userRoleId = Role::where('name', 'user')->first()->id;

            // Cambia el valor por defecto de 'role_id' a ese ID
            $table->unsignedBigInteger('role_id')->default($userRoleId)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
