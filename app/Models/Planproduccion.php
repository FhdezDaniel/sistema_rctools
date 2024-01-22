<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planproduccion extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function termoformadora(){
        return $this->belongsTo(Termoformadora::class, 'termoformadora_id');
    }
}
