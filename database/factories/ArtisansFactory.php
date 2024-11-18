<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArtisansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make( 'Passer123'),
            'telephone' => fake()->unique()->phoneNumber,
            'adresse' =>fake()->unique()->address,
            'etat' => fake()->numberBetween(0, 1), // Génère un entier entre 0 et 1
        ];
    }
}
