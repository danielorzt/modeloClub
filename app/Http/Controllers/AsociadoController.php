<?php

namespace App\Http\Controllers;

use App\Models\Asociado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AsociadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asociados = Asociado::all();
        return response()->json($asociados);
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
            'documento' => 'required|string|max:20|unique:asociados',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'direccion_residencia' => 'nullable|string|max:200',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:asociados',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $asociado = Asociado::create($validator->validated());
        return response()->json($asociado, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $asociado = Asociado::find($id);
        if(!$asociado){
            return response()->json('Asociado no existe', 404);
        }
        return response()->json($asociado);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asociado $asociado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asociado = Asociado::find($id);
        if(!$asociado){
            return response()->json('Asociado no existe', 404);
        }

        $validator = Validator::make($request->all(), [
            'documento' => 'required|string|max:20|unique:asociados,documento,'.$id,
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'direccion_residencia' => 'nullable|string|max:200',
            'telefono' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:100|unique:asociados,email,'.$id,
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        $asociado->update($validator->validated());
        return response()->json($asociado);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asociado = Asociado::find($id);
        if(!$asociado){
            return response()->json('Asociado no existe', 404);
        }
        $asociado->delete();
        return response()->json('Asociado borrado', 201);
    }
}
