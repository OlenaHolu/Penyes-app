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
            ['name' => 'Kilo Crew', 'year' => 2022, 'slogan' => 'Rise Above', 'color' => '🟦 Navy Blue'],
            ['name' => 'Lima Crew', 'year' => 2023, 'slogan' => 'Strive for Excellence', 'color' => '🟫 Dark Brown'],
            ['name' => 'Mike Crew', 'year' => 2020, 'slogan' => 'Victory Awaits', 'color' => '🟧 Light Orange'],
            ['name' => 'November Crew', 'year' => 2021, 'slogan' => 'We Stand Together', 'color' => '🟩 Teal'],
            ['name' => 'Oscar Crew', 'year' => 2022, 'slogan' => 'Defeat the Odds', 'color' => '🟪 Dark Purple'],
            ['name' => 'Papa Crew', 'year' => 2023, 'slogan' => 'Power to the People', 'color' => '🟦 Sky Blue'],
            ['name' => 'Quebec Crew', 'year' => 2020, 'slogan' => 'Always Forward', 'color' => '🟨 Light Yellow'],
            ['name' => 'Romeo Crew', 'year' => 2021, 'slogan' => 'Together as One', 'color' => '🟥 Deep Red'],
            ['name' => 'Sierra Crew', 'year' => 2022, 'slogan' => 'Strength in Unity', 'color' => '🟩 Forest Green'],
            ['name' => 'Tango Crew', 'year' => 2023, 'slogan' => 'Determination Wins', 'color' => '🟩 Lime Green'],
            ['name' => 'Uniform Crew', 'year' => 2020, 'slogan' => 'Persistence Pays', 'color' => '🟪 Violet'],
            ['name' => 'Victor Crew', 'year' => 2021, 'slogan' => 'The Sky is the Limit', 'color' => '🟦 Blue'],
            ['name' => 'Whiskey Crew', 'year' => 2022, 'slogan' => 'Never Stop Fighting', 'color' => '🟩 Sea Green'],
            ['name' => 'X-ray Crew', 'year' => 2023, 'slogan' => 'Conquer the Impossible', 'color' => '🟧 Orange'],
            ['name' => 'Yankee Crew', 'year' => 2020, 'slogan' => 'Victory is Ours', 'color' => '🟨 Golden Yellow'],
            ['name' => 'Zulu Crew', 'year' => 2021, 'slogan' => 'We Rise, We Shine', 'color' => '🟩 Emerald Green']
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
