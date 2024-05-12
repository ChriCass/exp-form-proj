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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_col')->after('password');
            $table->unsignedBigInteger('codigo_rol')->after('codigo_col');
            $table->boolean('estado_usu')->default(true); 
            $table->foreign('codigo_col')->references('codigo_col')->on('colaboradors');
            $table->foreign('codigo_rol')->references('codigo_rol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
