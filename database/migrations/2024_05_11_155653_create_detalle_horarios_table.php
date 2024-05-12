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
        Schema::create('detalle_horarios', function (Blueprint $table) {
            $table->id('codigo_dho');
            $table->unsignedBigInteger('codigo_hor');
            $table->dateTime('dia_dho'); // Asumiendo que "dia_dho" es tipo DATETIME como en tu definición
            $table->string('tipo_dho', 50); // Ajustado de DATETIME a STRING, parece ser un error en tu definición
            $table->dateTime('horainicio_dho');
            $table->dateTime('horafin_dho');
            $table->boolean('estado_dho')->default(true); // BIT se traduce a booleano en Laravel

            // Clave foránea
            $table->foreign('codigo_hor')->references('codigo_hor')->on('horarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_horarios');
    }
};
