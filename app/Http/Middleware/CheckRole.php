<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ---$roles): Response
    {
        //Verificamos si el usuario está autenticado
       if(!request->user()){
           return response()->view(['error.403'=>'No autorizado'],401);
}
       //Obetenemos el rol del usuario
       $userRole = $request->user()->role;

       //Verificamos si el rol del usuario está en la lista de roles permitidos
       if(!in_array($userRole, $roles)){
           return response()->view(['error.403'=>'No tienes permso para acceder a este recurso'],401);
       }

       //Si todo está bien, continuamos con la petición
        return $next($request);
    }
}
