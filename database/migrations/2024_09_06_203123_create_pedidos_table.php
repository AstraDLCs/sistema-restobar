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
        Schema::create('pedidos', function (Blueprint $table) {
            //Aqui creamos la tablas para la migracion
            $table->id();
            $table->timestamps();
            $table->foreignId('sala_id')->constrained();
            $table->integer('numero_mesa');
            $table->decimal('total', 8, 2);
            $table->text('observaciones');
            $table->integer('estado');
            $table->foreignId('user_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
