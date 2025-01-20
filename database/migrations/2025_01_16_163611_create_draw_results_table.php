<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('draw_results', function (Blueprint $table) {
        $table->id();
        $table->year('year');
        $table->json('results'); // Almacenar los resultados como JSON
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('draw_results');
}

};
