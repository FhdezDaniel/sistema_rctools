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
        Schema::create('termoformadoras', function (Blueprint $table) {
            $table->id();
            $table->integer('termoformadora');
            $table->string('producto',50);
            $table->integer('suaje_id');
            $table->integer('cantidad');
            $table->char('corte',30);
            $table->string('material',50);
            $table->date('inicio');
            $table->date('termino');
            $table->string('estatus',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termoformadoras');
    }
};
