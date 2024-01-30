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
        Schema::create('suajes', function (Blueprint $table) {
            $table->id();
            $table->char('codigo');
            $table->unsignedBigInteger('corte_id');
            $table->foreign('corte_id')->references('id')->on('cortes');
            $table->string('activo');
            $table->integer('cantidad')->nullable();
            $table->string('comentarios')->nullable();
            $table->string('estatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suajes');
    }
};
