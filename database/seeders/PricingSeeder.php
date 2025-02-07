<?php

namespace Database\Seeders;

use App\Models\Crew;
use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    public function run()
    {
        $amountsByYear = [
            2022 => 55.00,
            2023 => 60.00,
            2024 => 65.00,
            2025 => 70.00,
        ];

        $crews = Crew::all();

        foreach ($crews as $crew) {
            foreach ($amountsByYear as $year => $amount) {
                Pricing::create([
                    'crew_id' => $crew->id,
                    'amount' => $amount,
                    'year' => $year,
                ]);
            }
        }
    }
}
