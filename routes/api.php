<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsociadoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\AuthController; // Import the AuthController
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Rutas para la API de la aplicación.
| Se cargan automáticamente y se les asigna el grupo de middleware 'api'.
|
*/

/* Ruta protegida para obtener el usuario autenticado (si usas Sanctum/Passport)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


// --- Authentication Routes ---
// These routes are typically not protected by JWT middleware initially
Route::group([
    'middleware' => 'api', // Already applied by the api.php group, but good for clarity
    'prefix' => 'auth' // Optional: group under /api/auth
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']); // Add the registration route

    // These routes require a valid JWT to access
    Route::middleware('auth:api')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']); // Using POST is common for /me with JWT

        // --- Rutas RESTful para los Recursos usando apiResource (Ahora protegidas) ---

        // Define las rutas estándar CRUD para Actividades:
        Route::apiResource('actividades', ActividadController::class);

        // Define las rutas estándar CRUD para Asociados
        Route::apiResource('asociados', AsociadoController::class);

        // Define las rutas estándar CRUD para Pagos
        Route::apiResource('pagos', PagoController::class);

        // Define las rutas estándar CRUD para Participaciones
        Route::apiResource('participaciones', ParticipacionController::class);

        // Define las rutas estándar CRUD para Prestamos
        Route::apiResource('prestamos', PrestamoController::class);

        // --- Rutas Personalizadas Protegidas (Si las necesitas) ---
        // Si necesitas rutas adicionales dentro del grupo protegido:
        // Route::get('/prestamos/{prestamo}/calcular-cuota', [PrestamoController::class, 'calcularCuota']);

    });
});


// --- Rutas RESTful para los Recursos usando apiResource (Las anteriores están comentadas/movidas) ---

// Define las rutas estándar CRUD para Actividades:
// GET /api/actividades -> ActividadController@index
// POST /api/actividades -> ActividadController@store
// GET /api/actividades/{actividad} -> ActividadController@show
// PUT/PATCH /api/actividades/{actividad} -> ActividadController@update
// DELETE /api/actividades/{actividad} -> ActividadController@destroy

// Las siguientes rutas apiResource originales están ahora MOVidas dentro del grupo 'auth:api' para protección:
/*
Route::apiResource('actividades', ActividadController::class);
Route::apiResource('asociados', AsociadoController::class);
Route::apiResource('pagos', PagoController::class);
Route::apiResource('participaciones', ParticipacionController::class);
Route::apiResource('prestamos', PrestamoController::class);
*/


// --- Rutas Personalizadas (Si las necesitas) que NO REQUIERAN autenticación ---
// Si necesitas rutas que sean públicas y no requieran autenticación, definelas aquí afuera.
// Por ejemplo:
// Route::get('/public/data', [SomeController::class, 'publicMethod']);


// --- Rutas Antiguas (Comentadas o Eliminadas) ---
/*
// Actividades routes (Reemplazadas por apiResource)
// Route::get('listarActividades', [ActividadController::class, 'index'])->name('listar.actividades');
// Route::get('crearActividad', [ActividadController::class, 'create'])->name('crear.actividad'); // Debe ser POST a /actividades
// Route::get('listarActivides', [ActividadController::class, 'getActivides'])->name('mostrar.actividades'); // Método inexistente/Redundante
// Route::put('actualizarActividad', [ActividadController::class, 'update'])->name('actualizar.actividad'); // Falta ID
// Route::delete('eliminarActividad', [ActividadController::class, 'destroy'])->name('eliminar.actividad'); // Falta ID

// ... (comentar o eliminar las definiciones antiguas para otros controladores también) ...
*/
