<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Añadido para logging
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException; // Añadido para manejar excepciones de validación

class ActividadController extends Controller
{
    /**
     * Muestra un listado de todas las actividades.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Podrías añadir paginación si esperas muchas actividades: Actividad::paginate(15);
        $actividades = Actividad::all();
        return response()->json($actividades);
    }

    /**
     * Método para mostrar un formulario de creación (generalmente no usado en API).
     */
    public function create()
    {
        // Normalmente vacío en controladores de API
        return response()->json(['message' => 'Método create no implementado para API.'], 405); // 405 Method Not Allowed
    }

    /**
     * Almacena una nueva actividad en la base de datos.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Asegúrate que las claves ('Nombre_Actividad', etc.) coincidan
        // con lo que envía el cliente Y con el $fillable del modelo Actividad.
        $validator = Validator::make($request->all(), [
            'Nombre_Actividad' => 'required|string|max:100',
            'Fecha_Actividad' => 'required|date_format:Y-m-d', // Asegurar formato de fecha
            'Total_Recaudado' => 'required|numeric|min:0', // Usar el nombre de la columna
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422); // 422 Unprocessable Entity
        }

        try {
            // Usar create con los datos validados (asegúrate que $fillable en el Modelo los incluye)
            $actividad = Actividad::create($validator->validated());
            return response()->json($actividad, 201); // 201 Created
        } catch (\Exception $e) {
            Log::error('Error al crear actividad: ' . $e->getMessage());
            return response()->json(['message' => 'Error interno al crear la actividad.'], 500);
        }
    }

    /**
     * Muestra la actividad especificada.
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $id)
    {
        // findOrFail automáticamente devuelve 404 si no se encuentra
        try {
            $actividad = Actividad::with('participaciones')->findOrFail($id); // Cargar relación si es útil
            return response()->json($actividad);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Actividad no encontrada.'], 404);
        }
    }

    /**
     * Método para mostrar un formulario de edición (generalmente no usado en API).
     * @param \App\Models\Actividad $actividad (Se puede usar Route Model Binding si la ruta lo soporta)
     */
    public function edit(Actividad $actividad) // Usando Route Model Binding implícito
    {
        // Normalmente vacío en controladores de API
        // Si la ruta no usa Route Model Binding, necesitarías $id y findOrFail($id)
        return response()->json(['message' => 'Método edit no implementado para API.'], 405);
    }

    /**
     * Actualiza la actividad especificada en la base de datos.
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, string $id)
    {
        try {
            $actividad = Actividad::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Actividad no encontrada.'], 404);
        }

        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'Nombre_Actividad' => 'sometimes|required|string|max:100', // 'sometimes' si no siempre se envía
            'Fecha_Actividad' => 'sometimes|required|date_format:Y-m-d',
            'Total_Recaudado' => 'sometimes|required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Actualizar solo con los datos validados que llegaron en la request
            $actividad->update($validator->validated());
            return response()->json($actividad); // Devuelve el modelo actualizado
        } catch (\Exception $e) {
            Log::error("Error al actualizar actividad {$id}: " . $e->getMessage());
            return response()->json(['message' => 'Error interno al actualizar la actividad.'], 500);
        }
    }

    /**
     * Elimina la actividad especificada de la base de datos.
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        try {
            $actividad = Actividad::findOrFail($id); // findOrFail maneja el 404
            $actividad->delete();
            // 204 No Content es común para DELETE exitoso sin devolver cuerpo
            // o puedes devolver un JSON si prefieres
            return response()->json(['message' => 'Actividad eliminada correctamente.'], 200);
            // return response()->noContent(); // Alternativa 204
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Actividad no encontrada.'], 404);
        } catch (\Exception $e) {
            // Capturar otros posibles errores (ej. error de BD por restricciones)
            Log::error("Error al eliminar actividad {$id}: " . $e->getMessage());
            // Podrías verificar si hay participaciones asociadas antes de borrar
            // y devolver un 409 Conflict si no se puede borrar.
            return response()->json(['message' => 'Error interno al eliminar la actividad.'], 500);
        }
    }
}
