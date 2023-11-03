<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horse>
 */
class HorseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'name' => fake()->name(),
            'birthdate'=> fake()->date(),
            'gender'=> fake()->randomElement(['male', 'female']),
            'passport_number'=> fake()->text(10),
            'tenant_id' => 1,
            'comments' => fake()->text(),

        ];
    }
}