<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacenprovisional extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function materiaprima(){
        return $this->belongsTo(Materiaprima::class, 'materiaprima_id');
    }

}
