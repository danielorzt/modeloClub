<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Necesario para el helper middleware()
use Illuminate\Foundation\Validation\ValidatesRequests; // Opcional, pero buena práctica

class AuthController extends Controller
{
    // Puedes usar estos traits si tu Controller base no los tiene,
    // aunque en Laravel 11+ el Controller base suele ser mínimo.
    // use AuthorizesRequests, ValidatesRequests;

    /**
     * Define el middleware para este controlador.
     * Este método es la forma moderna de registrar middleware en controladores en Laravel 11+.
     *
     * @return array<int, \Illuminate\Routing\Controllers\Middleware|\Closure|string>
     */
    public static function middleware(): array
    {
        return [
            // Aplica el middleware 'auth:api' a todos los métodos excepto 'login' y 'register'.
            new \Illuminate\Routing\Controllers\Middleware('auth:api', except: ['login', 'register']),
        ];
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Intenta autenticar usando el guard 'api' (configurado para jwt)
        if (! $token = Auth::guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Register a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Inicia sesión con el guard 'api' para obtener el token JWT
            $token = Auth::guard('api')->attempt($request->only('email', 'password'));

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user,
                'access_token' => $token,
                'token_type' => 'bearer',
                // Asegúrate que el guard 'api' esté configurado para JWT en config/auth.php
                // y que JWTAuth pueda obtener el TTL a través de él.
                'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Error during user registration: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'Error during registration. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        // Obtiene el usuario autenticado a través del guard 'api'
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        // Cierra la sesión del guard 'api'
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        // Refresca el token usando el guard 'api'
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // Asegúrate que el guard 'api' esté configurado para JWT
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60, // TTL en segundos
        ]);
    }
}
