<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registroempaquetado extends Model
{
    use HasFactory;

    public function empleado(){
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }
}
