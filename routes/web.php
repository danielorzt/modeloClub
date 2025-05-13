<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Importa el HomeController
use Mcamara\LaravelLocalization\Facades\LaravelLocalization; // Importa la Facade

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
        ]
    ],
    function() {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        // Ruta principal ahora apunta a HomeController@index
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Puedes añadir aquí otras rutas que también necesiten localización
        // Ejemplo: Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    }
);

// RUTAS NO LOCALIZADAS (si las tienes, como APIs) pueden ir fuera del grupo
// Route::get('/api/status', ...);
