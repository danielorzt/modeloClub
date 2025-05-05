<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    public function asociado()
    {
        return $this->belongsTo(Asociado::class, 'asociado_id');
    }
    public function actividad()
    {
        return $this->belongsTo(Actividad::class, 'actividad_id');
    }
}
