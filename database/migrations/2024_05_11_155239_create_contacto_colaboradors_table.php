<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contacto_colaboradors', function (Blueprint $table) {
            $table->id('codigo_con');
            $table->unsignedBigInteger('codigo_col');
            $table->unsignedBigInteger('codigo_tcc');
            $table->string('descripcion_con', 100);
            $table->boolean('principal_con')->nullable(); // 1: principal, 0: secundario
            $table->boolean('estado_con')->default(true);
            $table->dateTime('fecha_reg')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecha_mod')->nullable();
            $table->dateTime('fecha_eli')->nullable();

            // Definiciones de las claves foráneas
            $table->foreign('codigo_col')->references('codigo_col')->on('colaboradores');
            $table->foreign('codigo_tcc')->references('codigo_tcc')->on('tipo_contacto_colaboradors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_colaboradors');
    }
};
