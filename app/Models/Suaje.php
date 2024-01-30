<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suaje extends Model
{
    use HasFactory;

    public function corte(){
        return $this->belongsTo(Corte::class, 'corte_id');
    }

    public function inventariosuaje(){
        return $this->hasMany(InventarioSuaje::class, 'id');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'id');
    }
}

