<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::with('asociado')->get();
        return response()->json($prestamos);
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
            'asociado_id' => 'required|exists:asociados,id',
            'valor_prestamo' => 'required|numeric|min:0',
            'tasa_interes' => 'nullable|numeric|min:0|max:100',
            'numero_cuotas' => 'required|integer|min:1',
            'fecha_prestamo' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $prestamo = Prestamo::create($validator->validated());
        return response()->json($prestamo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestamo = Prestamo::with(['asociado', 'pagos'])->find($id);
        if(!$prestamo){
            return response()->json('Préstamo no existe', 404);
        }
        return response()->json($prestamo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestamo = Prestamo::find($id);
        if(!$prestamo){
            return response()->json('Préstamo no existe', 404);
        }

        $validator = Validator::make($request->all(), [
            'asociado_id' => 'required|exists:asociados,id',
            'valor_prestamo' => 'required|numeric|min:0',
            'tasa_interes' => 'nullable|numeric|min:0|max:100',
            'numero_cuotas' => 'required|integer|min:1',
            'fecha_prestamo' => 'required|date',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $prestamo->update($validator->validated());
        return response()->json($prestamo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $prestamo = Prestamo::find($id);
        if(!$prestamo){
            return response()->json('Préstamo no existe', 404);
        }
        $prestamo->delete();
        return response()->json('Préstamo borrado', 201);
    }
}
