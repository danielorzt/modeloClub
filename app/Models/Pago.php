<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestamo_id',
        'fecha_pago',
        'valor_pago',
        'numero_cuota'
    ];

    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
