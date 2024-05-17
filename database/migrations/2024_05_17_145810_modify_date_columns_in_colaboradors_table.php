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
        Schema::table('colaboradors', function (Blueprint $table) {
              // Modificar las columnas a tipo date
              $table->date('fechaingreso_col')->nullable()->change();
              $table->date('fechacese_per')->nullable()->change();
  
              // Eliminar las columnas
              $table->dropColumn(['fecha_col', 'fecha_mod', 'fecha_eli']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('colaboradors', function (Blueprint $table) {
              // Revertir las columnas a tipo dateTime
              $table->dateTime('fechaingreso_col')->nullable()->change();
              $table->dateTime('fechacese_per')->nullable()->change();
  
              // Agregar las columnas eliminadas
              $table->dateTime('fecha_col')->default(DB::raw('CURRENT_TIMESTAMP'));
              $table->dateTime('fecha_mod')->nullable();
              $table->dateTime('fecha_eli')->nullable();
        });
    }
};
