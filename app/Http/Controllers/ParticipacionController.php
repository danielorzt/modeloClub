<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participaciones = Participacion::with(['asociado', 'actividad'])->get();
        return response()->json($participaciones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'actividad_id' => 'required|exists:actividades,id',
            'asociado_id' => 'required|exists:asociados,id',
            'monto_asignado' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $participacion = Participacion::create($validator->validated());

        // Actualizar el total recaudado en la actividad
        $actividad = $participacion->actividad;
        $actividad->total_recaudado = $actividad->total_recaudado + $participacion->monto_asignado;
        $actividad->save();

        return response()->json($participacion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participacion = Participacion::with(['asociado', 'actividad'])->find($id);
        if(!$participacion){
            return response()->json('Participación no existe', 404);
        }
        return response()->json($participacion);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participacion $participacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $participacion = Participacion::find($id);
        if(!$participacion){
            return response()->json('Participación no existe', 404);
        }

        $validator = Validator::make($request->all(), [
            'actividad_id' => 'required|exists:actividades,id',
            'asociado_id' => 'required|exists:asociados,id',
            'monto_asignado' => 'required|numeric|min:0',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        // Guardar el monto anterior para ajustar el total recaudado de la actividad
        $montoAnterior = $participacion->monto_asignado;

        $participacion->update($validator->validated());

        // Actualizar el total recaudado en la actividad
        $actividad = $participacion->actividad;
        $actividad->total_recaudado = $actividad->total_recaudado - $montoAnterior + $participacion->monto_asignado;
        $actividad->save();

        return response()->json($participacion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $participacion = Participacion::find($id);
        if(!$participacion){
            return response()->json('Participación no existe', 404);
        }

        // Actualizar el total recaudado en la actividad antes de eliminar
        $actividad = $participacion->actividad;
        $actividad->total_recaudado = $actividad->total_recaudado - $participacion->monto_asignado;
        $actividad->save();

        $participacion->delete();
        return response()->json('Participación borrada', 201);
    }
}
