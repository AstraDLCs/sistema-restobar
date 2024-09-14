<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sala;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
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

        $salaid = Sala::all()->random()->id;
        $numeroMesa = Sala::select('mesas')->where('id', $salaid)->first()->mesas;

        return [
            'sala_id' => $salaid,
            'numero_mesa' => $faker->numberBetween(1, $numeroMesa),
            'total' => $faker->randomFloat(2, 1, 100),
            'observaciones' => $faker->text,
            'estado' => $faker->numberBetween(0, 1),
            'user_id' => User::all()->random()->id,
        ];
    }
}
