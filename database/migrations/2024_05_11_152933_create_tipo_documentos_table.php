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
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id('codigo_tdoc'); // Utiliza id() para autoincrement primary key
            $table->string('nombre_tdoc', 50);
            $table->string('abreviatura_tdoc', 5);
            $table->boolean('estado_tdoc')->default(true); // bit se traduce a boolean y establece el valor por defecto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_documentos');
    }
};
