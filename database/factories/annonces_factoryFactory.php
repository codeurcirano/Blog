<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class annonces_factoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "biens_id" => factory(App\Models\biens::class)->create()->id,
            'date_de_publication' => $faker->dateTime,
            'date_de_fin' => $faker->dateTime,
            "etat" => $faker->randomElement(["en_vente", 'en_location']),
        ];
    }
}