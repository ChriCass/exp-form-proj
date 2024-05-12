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
        Schema::create('tipo_contacto_colaboradors', function (Blueprint $table) {
            $table->id('codigo_tcc');
            $table->string('nombre_tcc', 30);
            $table->string('abreviatura_tcc', 5)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_contacto_colaboradors');
    }
};
