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
        Schema::create('configuracions', function (Blueprint $table) {
            $table->timestamps();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('email');
            $table->string('direccion');
            $table->string('mensaje');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configuracions');
    }
};
