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
            $table->unsignedBigInteger('codigo_are'); // Clave foránea sin el helper foreignId para mayor claridad
            $table->string('nombre_cgo', 100);
            $table->string('abreviatura_cgo', 5);
            $table->boolean('estado_cgo')->default(true); // BIT se convierte en booleano
    
            // Establece la clave foránea que referencia la columna 'codigo_are' en la tabla 'areas'
            $table->foreign('codigo_are', 'FK_Cargo_Area')
                ->references('codigo_are') // Asegúrate de que esta es la columna correcta
                ->on('areas')
                ->onDelete('restrict') // Opción para manejar la eliminación en 'areas'
                ->onUpdate('cascade'); // Opción para manejar la actualización en 'areas'
            $table->timestamps();
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
