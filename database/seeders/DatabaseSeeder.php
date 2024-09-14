<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Configuracion;
use App\Models\Sala;
use App\Models\Plato;
use App\Models\Pedido;
use App\Models\DetallePedido;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UsersTableSeeder::class]);
        $this->call([ConfiguracionTableSeeder::class]);
        Sala::factory(20)->create();
        Plato::factory(25)->create();
        Pedido::factory(100)->create();
        DetallePedido::factory(20)->create();
    }
}
