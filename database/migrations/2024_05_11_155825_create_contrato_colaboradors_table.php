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
        Schema::create('contrato_colaboradors', function (Blueprint $table) {
            $table->id('codigo_cco');
            $table->unsignedBigInteger('codigo_col');
            $table->unsignedBigInteger('codigo_hor');
            $table->dateTime('fechainicio_cco')->nullable();
            $table->dateTime('fechafin_cco')->nullable();
            $table->decimal('remuneracion_cco', 9, 2);
            $table->boolean('estado_cto')->default(true);

            // Claves foráneas
            $table->foreign('codigo_col')->references('codigo_col')->on('colaboradors')->onDelete('cascade');
            $table->foreign('codigo_hor')->references('codigo_hor')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrato_colaboradors');
    }
};
