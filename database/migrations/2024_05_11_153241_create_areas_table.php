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
        Schema::create('areas', function (Blueprint $table) {
            $table->id('codigo_are'); // ID autoincremental y clave primaria
            $table->string('nombre_are', 120);
            $table->string('abreviatura_are', 10);
            $table->boolean('estado_are')->default(true); // BIT se convierte en booleano
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
