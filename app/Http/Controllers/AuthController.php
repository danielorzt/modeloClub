<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Asegúrate de que la ruta a tu modelo User sea correcta
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Para registrar errores
// Si tu Controller base no usa estos traits y los necesitas para otras cosas, puedes añadirlos.
// En Laravel 11+ el Controller base es mínimo.
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthController extends Controller
{
    // use AuthorizesRequests, ValidatesRequests; // Descomenta si los necesitas

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
     * Intenta iniciar sesión y devuelve un token JWT.
     *
     * @param  \Illuminate\Http\Request  $request
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
     * Registra un nuevo usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validación de los datos de entrada
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'rol' => 'sometimes|string|max:50', // 'sometimes' hace el campo opcional en la petición
            // Considera 'required' si siempre debe enviarse.
            // Podrías usar una regla Enum para roles específicos: 'sometimes|in:admin,editor,usuario'
        ]);

        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                // Asigna el rol proporcionado o un valor por defecto si no se envía
                'rol' => $request->input('rol', 'usuario'), // Usamos input() para poder dar un default
            ]);

            // Opcionalmente, inicia sesión con el guard 'api' para obtener el token JWT inmediatamente
            // LÍNEA CORREGIDA:
            $token = Auth::guard('api')->attempt(['email' => $validatedData['email'], 'password' => $request->password]);

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user, // El objeto $user ya incluirá el rol
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
            ], 201); // 201 Created status code

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Esto es por si quieres manejar la excepción de validación explícitamente aquí,
            // aunque Laravel normalmente lo hace automáticamente.
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Error during user registration: ' . $e->getMessage(), ['exception' => $e]);

            return response()->json([
                'success' => false,
                'message' => 'Error during registration. Please try again.',
                // No expongas $e->getMessage() directamente en producción por seguridad.
                // 'error_details' => $e->getMessage(), // Solo para depuración
            ], 500); // 500 Internal Server Error
        }
    }

    /**
     * Obtiene los datos del usuario autenticado (incluyendo el rol).
     * Este método es el estándar y el que probablemente quieras usar.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = Auth::guard('api')->user();

        // El modelo User ya debería incluir el campo 'rol'
        // si está en $fillable y existe en la base de datos.
        // La respuesta automática de Laravel al convertir el modelo a JSON lo incluirá.
        return response()->json($user);
    }

    /**
     * Alternativa: Obtiene el perfil del usuario autenticado (incluyendo rol).
     * Puedes usar este si prefieres un nombre de endpoint diferente como '/profile'.
     * Funcionalmente es similar a me() si solo devuelves el usuario.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        $user = Auth::guard('api')->user();

        // Simplemente devolvemos el objeto usuario.
        // Si el campo 'rol' está en la tabla users y es fillable en el modelo User,
        // se incluirá automáticamente.
        return response()->json($user);
    }

    /**
     * Cierra la sesión del usuario (Invalida el token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout(); // Invalida el token actual

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresca un token.
     * El token antiguo se invalida (si el blacklist está habilitado).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }

    /**
     * Obtiene la estructura del array del token.
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
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60, // TTL en segundos
        ]);
    }
}
