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
        Schema::table('contrato_colaboradors', function (Blueprint $table) {
            $table->date('fechainicio_cco')->nullable()->change();
            $table->date('fechafin_cco')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contrato_colaboradors', function (Blueprint $table) {
            $table->dateTime('fechainicio_cco')->nullable()->change();
            $table->dateTime('fechafin_cco')->nullable()->change();
        });
    }
};
