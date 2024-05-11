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
        Schema::create('sexos', function (Blueprint $table) {
            $table->id('codigo_sex'); // ID autoincremental y primary key
            $table->string('nombre_sex', 50);
            $table->string('abreviatura_sex', 3);
            $table->boolean('estado_sex')->default(true); // bit se convierte en booleano
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sexos');
    }
};
