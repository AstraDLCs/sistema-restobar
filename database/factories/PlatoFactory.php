<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plato>
 */
class PlatoFactory extends Factory
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
        $precio = $faker->randomFloat(2, 1, 100);

        return [
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $faker->imageUrl(640, 480)
        ];
    }
}
