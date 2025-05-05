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
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id(); // Corresponde a ID_Participacion
            // Convención Laravel: actividad_id -> referencia tabla 'actividades'
            $table->foreignId('actividad_id')->constrained('actividades')->onDelete('cascade');
            // Convención Laravel: asociado_id -> referencia tabla 'asociados'
            $table->foreignId('asociado_id')->constrained('asociados')->onDelete('cascade');
            $table->decimal('Monto_Asignado', 15, 2);
            $table->timestamps();

            // Opcional: Clave única compuesta si una persona solo participa una vez por actividad
            // $table->unique(['actividad_id', 'asociado_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};

