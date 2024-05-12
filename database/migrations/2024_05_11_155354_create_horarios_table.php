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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id('codigo_hor');  // ID autoincremental y clave primaria
            $table->dateTime('horainicio_hor')->nullable(); // nullable porque no especificaste NOT NULL
            $table->dateTime('horafin_hor')->nullable(); // nullable por la misma razón
            $table->boolean('estado_hor')->default(true); // BIT se convierte en booleano con un valor predeterminado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
