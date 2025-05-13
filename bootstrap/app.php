<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // <-- Añadí la ruta API que tienes
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) { // <--- Modificar ESTE bloque
        // Añadir los middlewares de localización al grupo 'web' global
        $middleware->web(append: [
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            // Añade este si necesitas que las vistas se busquen en carpetas como /resources/views/es
            // \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
        ]);
        $middleware->alias([
            'verified' => \App\Http\Middleware\EnsureEmailIsVerified::class,
            'jwt.auth' => \PHPOpenSourceSaver\JWTAuth\Http\Middleware\Authenticate::class,
            'jwt.refresh' => \PHPOpenSourceSaver\JWTAuth\Http\Middleware\RefreshToken::class,
        ]);

        // Aquí puedes añadir/modificar otros middlewares globales si es necesario
        // Por ejemplo, si usas Sanctum para APIs:
        // $middleware->statefulApi(); // Descomentar si usas cookies para API auth

    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Configuración de excepciones
    })->create(); // <--- create() va al final de la cadena
