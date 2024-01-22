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
        Schema::create('registroinspeccionbarrenados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleado_id');
            $table->foreign('empleado_id')->references('id')->on('empleados');
            $table->char('maquina');
            $table->char('hora');
            $table->date('fecha');
            $table->integer('turno');
            $table->char('producto');
            $table->integer('total_piezas');
            $table->integer('piezas_malas');
            $table->char('tiempo_muerto_operador');
            $table->string('causa');
            $table->string('limpieza');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroinspeccionbarrenados');
    }
};
