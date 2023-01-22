<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
       $horses = \App\Models\Horse::inRandomOrder()
                ->limit(1)
                ->get();
        if (count($horses)!=0) $horse=$horses->first();

            $horse=\App\Models\Horse::factory()->create();

        return [
            'horse_id'              => $horse->id,
            'date_of_treatment'     => fake()->date(),
            'type_of_treatment'     => fake()->randomElement(['farrier','vet','vaccination','deworming','breeding']),
            'cost'                  => fake()->randomNumber(5, true),
            'date_of_notification'  => fake()->date(),
            'last_updated_by'              => User::factory()->create()->id
        ];
    }
}


