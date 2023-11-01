<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('suajes', function (Blueprint $table) {
            $table->id();
            $table->string('modelo',50);
            $table->integer('cantidad');
            $table->string('corte',50);
            $table->boolean('estatus');
            $table->date('ingreso');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('suajes');
    }
};
