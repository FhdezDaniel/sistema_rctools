<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function planproduccions(){
        return $this->hasMany(Planproduccion::class, 'id');
    }

    public function almacenprovisionals(){
        return $this->hasMany(Almacenprovisional::class, 'id');
    }
}

