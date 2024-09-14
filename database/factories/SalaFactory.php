<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sala>
 */
class SalaFactory extends Factory
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
        $nombre = $faker->name;
        $mesas = $faker->numberBetween(1, 10);
        $estado = $faker->numberBetween(0, 1);
        
        return [
            'nombre' => $nombre,
            'mesas' => $mesas,
            'estado' => $estado,
        ];
    }
}
