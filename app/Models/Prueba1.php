<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba1 extends Model
{
    use HasFactory;


    public function suaje(){
        return $this->hasOne(Suajemodelo::class);
    }
}
