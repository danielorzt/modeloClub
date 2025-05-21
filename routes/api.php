<?php

use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AsociadoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\AuthController; // Importa el AuthController
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

// --- Rutas de Autenticación ---
// Estas rutas generalmente no están protegidas inicialmente por el middleware JWT.
Route::group([
    'middleware' => 'api', // Ya aplicado por el grupo api.php, pero bueno para mayor claridad
    'prefix' => 'auth' // Opcional: agrupa las rutas bajo /api/auth
], function ($router) {
    // Ruta para registrar un nuevo usuario
    // POST: /api/auth/register
    // Body esperado: name, email, password, password_confirmation
    Route::post('register', [AuthController::class, 'register']);

    // Ruta para iniciar sesión y obtener el token JWT
    // POST: /api/auth/login
    // Body esperado: email, password
    Route::post('login', [AuthController::class, 'login']);

    // Estas rutas requieren un JWT válido para acceder
    Route::middleware('auth:api')->group(function () {
        // Ruta para cerrar sesión (invalidar el token)
        // POST: /api/auth/logout
        // Requiere: Header de Autorización con el Token Bearer
        Route::post('logout', [AuthController::class, 'logout']);

        // Ruta para refrescar un token JWT existente
        // POST: /api/auth/refresh
        // Requiere: Header de Autorización con el Token Bearer
        Route::post('refresh', [AuthController::class, 'refresh']);

        // Ruta para obtener los detalles del usuario autenticado
        // POST: /api/auth/me
        // Requiere: Header de Autorización con el Token Bearer
        Route::post('me', [AuthController::class, 'me']);

        // --- Rutas RESTful para los Recursos (CRUD) ---
        // Estas rutas ahora están protegidas y requieren un token JWT.

        // Define las rutas estándar CRUD para Actividades:
        // GET    /api/auth/actividades           (index)
        // POST   /api/auth/actividades           (store)
        // GET    /api/auth/actividades/{id}      (show)
        // PUT    /api/auth/actividades/{id}      (update)
        // DELETE /api/auth/actividades/{id}      (destroy)
        // Requieren: Header de Autorización con el Token Bearer
        Route::apiResource('actividades', ActividadController::class);

        // Define las rutas estándar CRUD para Asociados
        // GET    /api/auth/asociados
        // POST   /api/auth/asociados
        // ... y así sucesivamente para show, update, destroy
        // Requieren: Header de Autorización con el Token Bearer
        Route::apiResource('asociados', AsociadoController::class);

        // Define las rutas estándar CRUD para Pagos
        // Requieren: Header de Autorización con el Token Bearer
        Route::apiResource('pagos', PagoController::class);

        // Define las rutas estándar CRUD para Participaciones
        // Requieren: Header de Autorización con el Token Bearer
        Route::apiResource('participaciones', ParticipacionController::class);

        // Define las rutas estándar CRUD para Prestamos
        // Requieren: Header de Autorización con el Token Bearer
        Route::apiResource('prestamos', PrestamoController::class);

        // --- Rutas Personalizadas Protegidas (Si las necesitas) ---
        // Si necesitas rutas adicionales dentro del grupo protegido:
        Route::post('profile', [AuthController::class, 'userProfile']);
        // Route::get('/prestamos/{prestamo}/calcular-cuota', [PrestamoController::class, 'calcularCuota']);
    });
});

// --- Rutas Personalizadas (Si las necesitas) que NO REQUIERAN autenticación ---
// Si necesitas rutas que sean públicas y no requieran autenticación, defínelas aquí afuera.
// Por ejemplo:
// Route::get('/public/data', [SomeController::class, 'publicMethod']);

?>
