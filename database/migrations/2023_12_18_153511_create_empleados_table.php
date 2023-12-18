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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->integer('numempleado');
            $table->string('nombre');
            $table->string('apepaterno');
            $table->string('apematerno');
            $table->string('puesto');
            $table->date('fechanacimiento');
            $table->date('fechaingreso');
            $table->char('correo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
