<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\configuracion;

class ConfiguracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $configuracion = new configuracion([
            "nombre" => "RestBar",
            "telefono" => "12345678",
            "email" => "prueba-email",
            "direccion" => "prueba-direccion",
            "mensaje" => "prueba-mensaje",
        ]);
        $configuracion->saveOrFail();
    }
}
