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
        Schema::create('planproduccions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('termoformadora_id');
            $table->foreign('termoformadora_id')->references('id')->on('termoformadoras');
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('cantidad');
            $table->string('corte')->nullable();
            $table->string('material')->nullable();
            $table->string('caja')->nullable();
            $table->string('bolsa')->nullable();
            $table->integer('cantidad_empaquetado')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planproduccions');
    }
};
