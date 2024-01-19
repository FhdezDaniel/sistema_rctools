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

        Schema::disableForeignKeyConstraints();

        Schema::create('prueba1s', function (Blueprint $table) {
            $table->id();
            $table->String('nombre');
            $table->integer('num_prueba');
            $table->integer('cantidad');
            
            $table->unsignedBigInteger('suaje_id');
            $table->foreign('suaje_id')->references('id')->on('suajemodelos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prueba1s');
    }
};
