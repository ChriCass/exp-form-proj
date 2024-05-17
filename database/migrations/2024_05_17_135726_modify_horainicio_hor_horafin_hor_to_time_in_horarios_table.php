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
        Schema::table('horarios', function (Blueprint $table) {
             $table->time('horainicio_hor')->nullable()->change();
            $table->time('horafin_hor')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('horarios', function (Blueprint $table) {
            $table->dateTime('horainicio_hor')->nullable()->change();
            $table->dateTime('horafin_hor')->nullable()->change();
        });
    }
};
