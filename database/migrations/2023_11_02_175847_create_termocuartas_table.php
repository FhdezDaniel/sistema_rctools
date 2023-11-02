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
        Schema::create('termocuartas', function (Blueprint $table) {
            $table->id();
            $table->string('producto',50);
            $table->integer('cantidad');
            $table->string('corte',30);
            $table->string('material',50);
            $table->date('inicio');
            $table->date('termino');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termocuartas');
    }
};
