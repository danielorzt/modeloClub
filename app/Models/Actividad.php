<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Quité la importación innecesaria de 'Has'
// use Illuminate\Testing\Fluent\Concerns\Has;

class Actividad extends Model
{
    use HasFactory;

    /**
     * La tabla asociada con el modelo.
     *
     * @var string
     */
    protected $table = 'actividades'; // <--- ¡Añade esta línea!

    /**
     * Los atributos que se pueden asignar masivamente.
     * Adapta estos nombres a snake_case si prefieres esa convención en el modelo,
     * o usa los nombres exactos de la migración si los mantienes así.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Nombre_Actividad', // Si usas este nombre en el controlador
        'Fecha_Actividad',  // Si usas este nombre en el controlador
        'Total_Recaudado' // Si usas este nombre en el controlador
        // O usa snake_case si cambiaste los controladores:
        // 'nombre',
        // 'fecha',
        // 'total_recaudado',
    ];

    // Define el tipo de dato para la fecha si no lo has hecho
    protected $casts = [
        'Fecha_Actividad' => 'date',
        // O si usas snake_case:
        // 'fecha' => 'date',
        'Total_Recaudado' => 'decimal:2',
        // O si usas snake_case:
        // 'total_recaudado' => 'decimal:2',
    ];


    public function participaciones() // Corregí el nombre de la relación a plural
    {
        // Asegúrate que 'actividad_id' es la llave foránea correcta en la tabla 'participaciones'
        return $this->hasMany(Participacion::class, 'actividad_id');
    }
}
