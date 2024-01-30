<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    public function registrotermoformados(){
        return $this->hasMany(Registrotermoformado::class, 'id');
    }

    public function registroempaquetados(){
        return $this->hasMany(Registroempaquetado::class, 'id');
    }

    public function registroprensas(){
        return $this->hasMany(Registroprensa::class, 'id');
    }

    public function registroinspeccionbarrenados(){
        return $this->hasMany(registroinspeccionbarrenado::class, 'id');
    }
}


