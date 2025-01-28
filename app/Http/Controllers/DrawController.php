<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Location;
use Illuminate\Http\Request;


class DrawController extends Controller
{

    const MAX_HEIGHT = 5;
    const MAX_WIDTH = 9;

    // Show the Draw View for a spesific year
    public function show($year = null)
    {
        $currentYear = now()->year;
        if (is_null($year)) {
            $year = $currentYear;
        }
        $locations = Location::where('year', $year)->with('crew')->get();
        $showDrawButton = true;
        $showDeleteDrawButton = false;

        if ($locations->count() > 0) {
            $showDrawButton = false;
            $showDeleteDrawButton = true;
        }
        $rangeYears = range($currentYear - 4, $currentYear);
        rsort($rangeYears);
        return view('draws.drawsAdminView', [
            'locations' => $locations,
            'year' => $year ?? now()->year,
            'showDrawButton' => $showDrawButton,
            'showDeleteDrawButton' => $showDeleteDrawButton,
            'rangeYears' => $rangeYears
        ]);
    }

    // Perform the draw process and assign locations to crews
    public function draw(Request $request)
    {
        $year = $request->year ?? now()->year;
        $crews = Crew::all()->pluck('name', 'id');

        if (count($crews) === 0) {
            return back()->withErrors('No hay peñas disponibles para este año.');
        }

        $places = [];

        // Assign random valid coordinates to each crew
        foreach ($crews as $crewId => $crewName) {
            $isValidCoord = false;
            while (!$isValidCoord) {
                $x = rand(0, (self::MAX_WIDTH - 1));
                $y = rand(0, (self::MAX_HEIGHT - 1));
                $coord = [$x, $y];
                $isValidCoord = $this->isValidCoord($coord, $places);
                if ($isValidCoord) {
                    $places[$crewId] = $coord;
                }
            }
        }
        $locations = [];
        foreach ($places as $crewId => $coord) {
            $locations[] = [
                'x' => $coord[0], //x
                'y' => $coord[1], //y
                'crew_id' => $crewId,
                'year' => $year
            ];
        }
        //Save locations in DB
        foreach ($locations as $location) {
            Location::create($location);
        }


        return redirect()->route('draw.show', ['year' => $year]);
    }

    // Delete Draw
    public function delete($year)
    {
        Location::where('year', $year)->delete();

        return redirect()->route('draw.show', ['year' => $year]);
    }

    private function isValidCoordSimple($coord, $places)
    {
        $isValidCoord = true;
        list($x, $y) = $coord;
        if (in_array($coord, $places)) {
            $isValidCoord = false;
        }
        return $isValidCoord;
    }


    private function isValidCoord($coord, $places)
    {
        list($x, $y) = $coord;

        if (in_array($coord, $places)) {
            return false;
        }

        // Check if the coordinate is on the perimeter
        $isPerimeter = ($x == 0 || $x == self::MAX_WIDTH - 1 || $y == 0 || $y == self::MAX_HEIGHT - 1);

        // Check if the coordinate is in a corner
        $isCorner = ($x == 0 && $y == 0) ||
            ($x == 0 && $y == self::MAX_HEIGHT - 1) ||
            ($x == self::MAX_WIDTH - 1 && $y == 0) ||
            ($x == self::MAX_WIDTH - 1 && $y == self::MAX_HEIGHT - 1);

        return $isPerimeter && !$isCorner;
    }
}
