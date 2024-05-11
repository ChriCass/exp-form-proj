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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id('codigo_cgo'); // ID autoincremental y clave primaria
            $table->foreignId('codigo_are')->constrained('areas'); // Clave foránea que referencia a la tabla 'areas'
            $table->string('nombre_cgo', 100);
            $table->string('abreviatura_cgo', 5);
            $table->boolean('estado_cgo')->default(true); // BIT se convierte en booleano
              // Establece la clave foránea que referencia la columna 'codigo_are' en la tabla 'areas'
              $table->foreign('codigo_are', 'FK_Cargo_Area')
              ->references('codigo_are')
              ->on('areas')
              ->onDelete('restrict') // Opción para manejar la eliminación en 'areas'
              ->onUpdate('cascade'); // Opción para manejar la actualización en 'areas'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
