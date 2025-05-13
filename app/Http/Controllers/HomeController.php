<?php

namespace App\Http\Controllers;

use App\Models\Actividad; // <--- Verifica
use App\Models\Asociado;  // <--- Verifica
use Illuminate\Http\Request; // <--- Verifica
use App\Http\Controllers\Controller; // <--- Verifica - ¡Importante!

class HomeController extends Controller // <--- Asegúrate que extiende Controller
{
    public function index()
    {
        try { // Puedes añadir un try-catch para depurar
            $totalActividades = Actividad::count();
            $totalAsociados = Asociado::count();
            $ultimasActividades = Actividad::latest()->take(3)->get();

            return view('welcome', [
                'totalActividades' => $totalActividades,
                'totalAsociados' => $totalAsociados,
                'ultimasActividades' => $ultimasActividades,
            ]);
        } catch (\Exception $e) {
            // Si hay un error aquí, lo mostrará en el log
            \Log::error("Error en HomeController@index: " . $e->getMessage());
            // Puedes retornar una vista de error o abortar
            abort(500, "Error al cargar la página principal.");
        }
    }
}
