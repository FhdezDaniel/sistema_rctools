<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->char('clave');
            $table->string('nombre');
            $table->unsignedBigInteger('suaje_id');
            $table->foreign('suaje_id')->references('id')->on('suajes');
            $table->unsignedBigInteger('materiaprima_id');
            $table->foreign('materiaprima_id')->references('id')->on('materiaprimas');
            $table->unsignedBigInteger('caja_id');
            $table->foreign('caja_id')->references('id')->on('cajas');
            $table->unsignedBigInteger('bolsa_id');
            $table->foreign('bolsa_id')->references('id')->on('bolsas');
            $table->date('fecha_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
