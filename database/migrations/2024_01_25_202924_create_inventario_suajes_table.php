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
        Schema::create('inventario_suajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suaje_id');
            $table->foreign('suaje_id')->references('id')->on('suajes');
            $table->integer('contador_uso');
            $table->date('fecha_registro');
            $table->date('fecha_evento')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('historial')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_suajes');
    }
};
