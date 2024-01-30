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

    public function bolsa(){
        return $this->belongsTo(Bolsa::class, 'bolsa_id');
    }

    public function caja(){
        return $this->belongsTo(Caja::class, 'caja_id');
    }
    
    public function materiaprima(){
        return $this->belongsTo(Materiaprima::class, 'materiaprima_id');
    }

    public function suaje(){
        return $this->belongsTo(Suaje::class, 'suaje_id');
    }
}

