<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asociado extends Model
{
    //
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'email'
    ];

    public function participaciones()
    {
        return $this->hasMany(Participacion::class, 'asociado_id');
    }
}
