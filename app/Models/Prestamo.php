<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'asociado_id',
        'valor_prestamo',
        'tasa_interes',
        'numero_cuotas',
        'fecha_prestamo'
    ];

    public function asociado()
    {
        return $this->belongsTo(Asociado::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
