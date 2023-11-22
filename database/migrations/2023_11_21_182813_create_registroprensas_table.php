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
        Schema::create('registroprensas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreop',50);
            $table->char('maquina');
            $table->date('fecha');
            $table->integer('turno');
            $table->char('producto',100);
            $table->integer('pzsbuenas');
            $table->integer('pzsmalas');
            $table->char('tiempoop');
            $table->char('tiempomtto');
            $table->string('observaciones');
            $table->string('limpieza',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroprensas');
    }
};
