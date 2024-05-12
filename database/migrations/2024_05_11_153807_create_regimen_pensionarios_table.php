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
        Schema::create('regimen_pensionarios', function (Blueprint $table) {
            $table->id('codigo_rp'); // ID autoincremental y clave primaria
            $table->string('nombre_rp', 100);
            $table->string('tipo_rp', 100); // Columna para indicar si es público o privado
            $table->string('porcentaje_rp', 100); // Columna para almacenar el porcentaje, aunque debería considerarse un tipo numérico
            $table->string('abreviatura_rp', 5);
            $table->boolean('estado_rp')->default(true); // BIT se convierte en booleano
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regimen_pensionarios');
    }
};
