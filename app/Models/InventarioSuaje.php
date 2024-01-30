<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioSuaje extends Model
{
    use HasFactory;

    public function suaje(){
        return $this->belongsTo(Suaje::class, 'suaje_id');
    }
}
