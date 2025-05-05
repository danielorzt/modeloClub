<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id(); // Corresponde a ID_Prestamo
            // Convención Laravel: asociado_id -> referencia tabla 'asociados'
            $table->foreignId('asociado_id')->constrained('asociados')->onDelete('cascade'); // onDelete cascade opcional
            $table->decimal('Valor_Prestamo', 15, 2);
            $table->decimal('Tasa_Interes', 5, 2)->nullable(); // Interés por periodo?
            $table->integer('Numero_Cuotas');
            $table->date('Fecha_Prestamo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
