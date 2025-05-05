<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Actividad extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'nombre',
        'fecha',
        'total'
    ];

    public function  participaciones()
    {
        return $this->hasMany(Participacion::class);
    }
}
