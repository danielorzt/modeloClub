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
        Schema::create('asociados', function (Blueprint $table) {
            $table->id(); // Corresponde a ID_Asociado como PK autoincremental
            $table->string('Documento', 20)->unique(); // Añadí unique, usualmente lo es
            $table->string('Nombres', 100);
            $table->string('Apellidos', 100);
            $table->date('Fecha_Nacimiento')->nullable(); // Permitir null si es posible
            $table->string('Direccion_Residencia', 200)->nullable();
            $table->string('Telefono', 15)->nullable();
            $table->string('Email', 100)->unique()->nullable(); // Añadí unique y nullable
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociados');
    }
};
