<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('prestamo')->get();
        return response()->json($pagos);
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
            'prestamo_id' => 'required|exists:prestamos,id',
            'fecha_pago' => 'required|date',
            'valor_pago' => 'required|numeric|min:0',
            'numero_cuota' => 'required|integer|min:1',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        // Verificar que la cuota no se haya pagado ya
        $pagosExistentes = Pago::where('prestamo_id', $request->prestamo_id)
            ->where('numero_cuota', $request->numero_cuota)
            ->first();

        if($pagosExistentes) {
            return response()->json('La cuota ya ha sido pagada', 422);
        }

        // Verificar que el número de cuota no supere el número de cuotas del préstamo
        $prestamo = Prestamo::find($request->prestamo_id);
        if($request->numero_cuota > $prestamo->numero_cuotas) {
            return response()->json('El número de cuota excede el número de cuotas del préstamo', 422);
        }

        $pago = Pago::create($validator->validated());
        return response()->json($pago, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pago = Pago::with('prestamo')->find($id);
        if(!$pago){
            return response()->json('Pago no existe', 404);
        }
        return response()->json($pago);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pago = Pago::find($id);
        if(!$pago){
            return response()->json('Pago no existe', 404);
        }

        $validator = Validator::make($request->all(), [
            'prestamo_id' => 'required|exists:prestamos,id',
            'fecha_pago' => 'required|date',
            'valor_pago' => 'required|numeric|min:0',
            'numero_cuota' => 'required|integer|min:1',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 422);
        }

        // Si cambia el número de cuota, verificar que no exista ya
        if($request->numero_cuota != $pago->numero_cuota) {
            $pagosExistentes = Pago::where('prestamo_id', $request->prestamo_id)
                ->where('numero_cuota', $request->numero_cuota)
                ->first();

            if($pagosExistentes) {
                return response()->json('La cuota ya ha sido pagada', 422);
            }
        }

        // Verificar que el número de cuota no supere el número de cuotas del préstamo
        $prestamo = Prestamo::find($request->prestamo_id);
        if($request->numero_cuota > $prestamo->numero_cuotas) {
            return response()->json('El número de cuota excede el número de cuotas del préstamo', 422);
        }

        $pago->update($validator->validated());
        return response()->json($pago);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pago = Pago::find($id);
        if(!$pago){
            return response()->json('Pago no existe', 404);
        }
        $pago->delete();
        return response()->json('Pago borrado', 201);
    }
}
