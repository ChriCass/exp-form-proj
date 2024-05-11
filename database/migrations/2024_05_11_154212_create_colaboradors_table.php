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
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->id('codigo_col');
            $table->unsignedBigInteger('codigo_tdoc');
            $table->string('numerodoc_col', 16);
            $table->string('apellidopaterno_col', 50);
            $table->string('apellidomaterno_col', 50);
            $table->string('nombres_col', 100);
            $table->unsignedBigInteger('codigo_sex')->nullable();
            $table->unsignedBigInteger('codigo_cgo')->nullable();
            $table->unsignedBigInteger('codigo_rp')->nullable();
            $table->unsignedBigInteger('codigo_eps')->nullable();
            $table->decimal('remuneracion_col', 9, 2)->nullable();
            $table->dateTime('fechaingreso_col')->nullable();
            $table->dateTime('fechacese_per')->nullable();
            $table->boolean('estado_col')->default(true);
            $table->dateTime('fecha_col')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecha_mod')->nullable();
            $table->dateTime('fecha_eli')->nullable();

            // Definiciones de las claves foráneas
            $table->foreign('codigo_tdoc')->references('codigo_tdoc')->on('tipo_documentos');
            $table->foreign('codigo_sex')->references('codigo_sex')->on('sexos');
            $table->foreign('codigo_cgo')->references('codigo_cgo')->on('cargos');
            $table->foreign('codigo_rp')->references('codigo_rp')->on('regimen_pensionarios');
            $table->foreign('codigo_eps')->references('codigo_eps')->on('eps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaboradors');
    }
};
