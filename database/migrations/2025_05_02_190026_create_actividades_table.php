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
Schema::create('actividades', function (Blueprint $table) {
$table->id(); // Corresponde a ID_Actividad
$table->string('Nombre_Actividad', 100);
$table->date('Fecha_Actividad');
$table->decimal('Total_Recaudado', 15, 2)->default(0.00); // Añadí default
$table->timestamps();
});
}

/**
* Reverse the migrations.
*/
public function down(): void
{
Schema::dropIfExists('actividades');
}
};

