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
        Schema::table('detalle_horarios', function (Blueprint $table) {
            $table->string('dia_dho')->change();
             
            $table->time('horainicio_dho')->change();
            $table->time('horafin_dho')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_horario', function (Blueprint $table) {
            //
        });
    }
};
