<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClientsFactory extends Factory
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
            'adresse' => fake()->unique()->address,
            'mensurations' => json_encode([ // Ajout de la clé `mesures` ici
                'tourCou' => fake()->numberBetween(35, 45),
                'largeurEpaule' => fake()->numberBetween(38, 50),
                'tourPoitrine' => fake()->numberBetween(80, 120),
                'hauteurPoitrine' => fake()->numberBetween(18, 30),
                'tourDessousPoitrine' => fake()->numberBetween(65, 105),
                'tourTaille' => fake()->numberBetween(60, 100),
                'tourTailleHaute' => fake()->numberBetween(70, 90),
                'tourHanche' => fake()->numberBetween(85, 115),
                'tourBras' => fake()->numberBetween(25, 35),
                'longueurBras' => fake()->numberBetween(55, 70),
                'longueurManches' => fake()->numberBetween(60, 80),
                'tourPoignet' => fake()->numberBetween(15, 20),
                'longueurDos' => fake()->numberBetween(40, 50),
                'longueurRobe' => fake()->numberBetween(80, 120),
            ]),
            'genre' => fake()->randomElement(['M', 'F']), // Liste de deux lettres au choix
            'etat' => fake()->numberBetween(0, 1), // Génère un entier entre 0 et 1
        ];
    }
}
