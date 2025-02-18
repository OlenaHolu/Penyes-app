<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Crew;

class ReactDrawController extends Controller
{
    const MAX_HEIGHT = 5;
    const MAX_WIDTH = 9;

    public function getYears()
    {
        $currentYear = now()->year;
        $years = range($currentYear - 4, $currentYear);
        rsort($years);

        return response()->json($years);
    }

    // Get locations for a specific year
    public function getLocations(Request $request)
    {
        $year = $request->query('year', now()->year);
        $locations = Location::where('year', $year)->with('crew')->get();

        return response()->json($locations);
    }


   
}
