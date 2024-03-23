<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class biens_factoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => $faker->randomElement(["appartement", "maison", "terrain"]),
                "titre" => $faker->sentence,
                "description" => $faker->paragraph,
                "adresse" => $faker->address,
                "ville" => $faker->city,
                "code_postal" => $faker->postcode,
                "pays" => $faker->country,
                "prix" => $faker->randomNumber(50),
                "surface" => $faker->randomNumber(2),
                "chambres" => $faker->randomNumber(1),
                "salles_de_bain" => $faker->randomNumber(1),
                "photos" => $faker->imageUrl(),
            
        ];
    }
}