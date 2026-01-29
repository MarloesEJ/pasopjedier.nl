<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $species = ['Hond', 'Kat', 'Vogel', 'Knaagdier'];
        return [
            'user_id' => \App\Models\User::factory(),
            'name' => fake()->firstName(),
            'species' => fake()->randomElement($species),
            'age' => fake()->numberBetween(1, 15),
            'description' => "Een heel lief dier dat graag aandacht krijgt en goed met kinderen kan.",
            'active' => true,
        ]; 
    }
}
