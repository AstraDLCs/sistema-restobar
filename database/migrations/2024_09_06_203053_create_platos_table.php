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
        Schema::create('platos', function (Blueprint $table) {
            
            //Aqui creamos la tablas para la migracion
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            $table->string('imagen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('platos');
    }
};
