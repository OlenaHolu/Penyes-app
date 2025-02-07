<?php

use App\Models\Crew;
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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id(); 
            $table->foreignIdFor(Crew::class);
            $table->decimal('amount', 8, 2); 
            $table->year('year');
            $table->timestamps();
        });
    }  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
