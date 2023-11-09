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
        Schema::create('produccionregistros', function (Blueprint $table) {
            $table->id();
            $table->string('nombreop',50);
            $table->char('maquina');
            $table->date('fecha');
            $table->integer('turno');
            $table->char('producto',100);
            $table->integer('pzsbuenas');
            $table->integer('pzsmalas');
            $table->char('tiempomto');
            $table->string('causa',150);
            $table->char('tiempoop');
            $table->string('causa2');
            $table->string('limpieza',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produccionregistros');
    }
};
