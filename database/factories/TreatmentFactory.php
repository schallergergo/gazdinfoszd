<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Horse;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       $horses = \App\Models\Horse::all();
        return [
            'horse_id'              => $horses->random()->id,
            'date_of_treatment'     => fake()->date(),
            'type_of_treatment'     => fake()->randomElement(['farrier','vet','vaccination','deworming','breeding']),
            'cost_of_treatment'                  => fake()->randomNumber(5, true),
            'date_of_notification'  => fake()->date(),
            'tenant_id' => rand(1,3),
        ];
    }
}


