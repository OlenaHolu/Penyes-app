<?php
namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\Location;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    public function show($year = null)
    {
        if ($year === null) {
            $locations = Location::where('year', now()->year)->with('crew')->get();
    } else {
        $locations = Location::where('year', $year)->with('crew')->get();
        }
    
        $showDrawButton = true;
    
        if ($locations->count() > 0) {
            $showDrawButton = false;
        }
    
        return view('draws.drawsAdminView', [
            'locations' => $locations,
            'year' => $year ?? now()->year,
            'showDrawButton' => $showDrawButton,
        ]);
    }
    
    // Realizar el sorteo y asignar ubicaciones
    public function draw(Request $request)
    {
        $year = $request->year ?? now()->year;
        $crews = Crew::where('year', '<=', $year)->pluck('name', 'id')->toArray();

        if (count($crews) === 0) {
            return back()->withErrors('No hay peñas disponibles para este año.');
        }

        // Definir las coordenadas válidas en el borde del cuadrado 5x9, excluyendo las esquinas
        $validCoordinates = [];
        for ($i = 0; $i < 5; $i++) {
            for ($j = 0; $j < 9; $j++) {
                // Excluir las esquinas
                if (
                    ($i === 0 && $j === 0) || ($i === 0 && $j === 8) || 
                    ($i === 4 && $j === 0) || ($i === 4 && $j === 8)
                ) {
                    continue;
                }
                // Añadir las coordenadas válidas
                $validCoordinates[] = ['x' => $j, 'y' => $i];
            }
        }

        // Si hay menos peñas que ubicaciones, agregar "No Crew" a los espacios vacíos
        $defaultCrew = "No Crew";  

        if (count($crews) < count($validCoordinates)) {
            $missing = count($validCoordinates) - count($crews);
            for ($i = 0; $i < $missing; $i++) {
                $crews[] = $defaultCrew;  // Add "No Crew" to the remaining spaces
            }
        }

        // Mezclar las coordenadas válidas y las peñas para el sorteo
        shuffle($validCoordinates);
        shuffle($crews);

        // Guardar las ubicaciones de las peñas en la base de datos
        $locations = [];
        for ($i = 0; $i < count($crews); $i++) {
            $location = $validCoordinates[$i];
            $locations[] = [
                'x' => $location['x'],
                'y' => $location['y'],
                'crew_id' => ($crews[$i] !== $defaultCrew) ? array_keys($crews)[$i] : null, // Avoid assigning crew_id if it's "No Crew"
                'year' => $year
            ];
        }

        // Guardar las ubicaciones en la base de datos
        foreach ($locations as $location) {
            Location::create($location); // Guardar cada ubicación con el crew_id correspondiente
        }

        // Redirigir para mostrar los resultados
        return redirect()->route('draw.show', ['year' => $year]);
    }

     // Eliminar el sorteo de un año
    public function delete($year)
    {
        // Eliminar las ubicaciones del sorteo para el año
        Location::where('year', $year)->delete();

        // Redirigir de nuevo a la vista con el año correspondiente
        return redirect()->route('draw.show', ['year' => $year]);
    }
}