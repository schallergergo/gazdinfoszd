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
            'gender'=> fake()->randomElement(['mén', 'kanca',"herélt"]),
            'box_in_stable'=>rand(1,3).". istálló ".rand(1,50).". boksz",
            'passport_number'=> "HU ".rand(1000,10000)."-".rand(1000,10000)."-".rand(1000,10000),
            'tenant_id' => 1,
            'comments' => fake()->text(),

        ];
    }
}