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
        Schema::create('eps', function (Blueprint $table) {
            $table->id('codigo_eps'); // ID autoincremental y clave primaria
            $table->string('nombre_eps', 100);
            $table->string('tipo_eps', 100); // Columna para indicar si es público o privado
            $table->string('abreviatura_eps', 5); // Corrige el nombre de la columna
            $table->boolean('estado_eps')->default(true); // BIT se convierte en booleano
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e_p_s');
    }
};
