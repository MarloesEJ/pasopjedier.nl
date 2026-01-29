<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OppasRequest>
 */
class OppasRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pet_id' => \App\Models\Pet::factory(),
            'owner_id' => function(array $attributes){
                return \App\Models\Pet::find($attributes['pet_id'])->user_id;
            },
            'title' => fake()->sentence(6, true),
            'start_date' => now()->addDays(fake()->numberBetween(1, 30)),
            'end_date' => now()->addDays(fake()->numberBetween(31, 60)),
            'price' => fake()->numberBetween(5, 20),
            'status' => 'open',
        ];
    }
}
