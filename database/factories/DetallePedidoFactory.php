<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallePedido>
 */
class DetallePedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));

        $pedidoId = Pedido::all()->random()->id;

        return [
            'nombre' => $faker->name,
            'precio' => $faker->randomFloat(2, 1, 100),
            'cantidad' => $faker->numberBetween(1, 10),
            'pedido_id' => $pedidoId,
        ];
    }
}
