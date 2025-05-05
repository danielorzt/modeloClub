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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id(); // Corresponde a ID_Pago
            // Convención Laravel: prestamo_id -> referencia tabla 'prestamos'
            $table->foreignId('prestamo_id')->constrained('prestamos')->onDelete('cascade');
            $table->date('Fecha_Pago');
            $table->decimal('Valor_Pago', 15, 2);
            $table->integer('Numero_Cuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
