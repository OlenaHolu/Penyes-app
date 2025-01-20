<?php

namespace App\Http\Controllers;

use App\Models\Crew;
use App\Models\DrawResult;
use Illuminate\Http\Request;

class DrawController extends Controller
{
    // Mostrar la vista del sorteo con los resultados
    public function show($year = null)
    {
        // Si no se proporciona un año, obtener el último sorteo
        if ($year === null) {
            $drawResult = DrawResult::orderBy('created_at', 'desc')->first();
        } else {
            // Buscar los resultados del sorteo del año seleccionado
            $drawResult = DrawResult::where('year', $year)->first();
        }

        // Si no hay resultados, mostramos un mensaje en la vista y permitimos realizar el sorteo
        $showDrawButton = true;
        $resultados = null;

        if ($drawResult) {
            // Si hay resultados, los decodificamos y pasamos a la vista
            $resultados = json_decode($drawResult->results, true);
            $showDrawButton = false;  // Ya no se muestra el botón si ya hay resultados
        }

        return view('draws.drawsAdminView', [
            'resultados' => $resultados,
            'year' => $year ?? now()->year,
            'showDrawButton' => $showDrawButton,
            'drawResult' => $drawResult,  // Pasar el resultado del sorteo para eliminarlo
        ]);
    }

    // Realizar el sorteo y almacenar los resultados
    public function draw(Request $request)
    {
        // Obtener el año del sorteo
        $year = $request->year ?? now()->year;

        // Obtener todas las peñas hasta el año seleccionado (inclusive)
        $crews = Crew::where('year', '<=', $year)->pluck('name', 'id')->toArray();

        // Verificar si hay peñas para el sorteo
        if (count($crews) === 0) {
            return back()->withErrors('No hay peñas disponibles para este año.');
        }

        // Generar el número de location según el número de peñas
        $location = range(1, count($crews));

        // Realizar el sorteo aleatorio
        shuffle($crews);
        $resultados = array_combine($location, $crews);

        // Almacenar los resultados en la base de datos
        DrawResult::create([
            'year' => $year,
            'results' => json_encode($resultados),
        ]);

        return redirect()->route('draw.show', ['year' => $year]);
    }

    // Eliminar el sorteo de un año
    public function delete($year)
    {
        // Buscar el resultado del sorteo del año
        $drawResult = DrawResult::where('year', $year)->first();

        // Si no se encuentra el sorteo, redirigir con mensaje de error
        if (!$drawResult) {
            return back()->withErrors('No se encontró un sorteo para este año.');
        }

        // Eliminar el sorteo
        $drawResult->delete();

        // Redirigir de nuevo a la vista con el año correspondiente
        return redirect()->route('draw.show', ['year' => $year]);
    }
}
