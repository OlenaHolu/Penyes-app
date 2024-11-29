<?php

namespace Database\Seeders;

use App\Models\Crew;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrewSeeder extends Seeder
{
    public function run()
    {
        $crews = [
            ['name' => 'Alpha Crew', 'year' => 2020, 'slogan' => 'Reach for the Stars', 'color' => '🟢 Green'],
            ['name' => 'Bravo Crew', 'year' => 2021, 'slogan' => 'Together We Rise', 'color' => '🔵 Blue'],
            ['name' => 'Charlie Crew', 'year' => 2022, 'slogan' => 'Unite and Conquer', 'color' => '🟠 Orange'],
            ['name' => 'Delta Crew', 'year' => 2023, 'slogan' => 'Strength in Unity', 'color' => '🟡 Yellow'],
            ['name' => 'Echo Crew', 'year' => 2020, 'slogan' => 'Power in Numbers', 'color' => '🟣 Purple'],
            ['name' => 'Foxtrot Crew', 'year' => 2021, 'slogan' => 'Fearless and Bold', 'color' => '🟤 Brown'],
            ['name' => 'Golf Crew', 'year' => 2022, 'slogan' => 'Chase the Dream', 'color' => '🟥 Red'],
            ['name' => 'Hotel Crew', 'year' => 2023, 'slogan' => 'Dare to Achieve', 'color' => '🟨 Yellow'],
            ['name' => 'India Crew', 'year' => 2020, 'slogan' => 'Honor and Glory', 'color' => '🟩 Light Green'],
            ['name' => 'Juliet Crew', 'year' => 2021, 'slogan' => 'Never Give Up', 'color' => '🔴 Dark Red'],
        ];

        foreach ($crews as $crew) {
            Crew::create([
                'name' => $crew['name'],
                'year' => $crew['year'],
                'slogan' => $crew['slogan'],
                'color' => $crew['color'],
            ]);
        }
    }
}
