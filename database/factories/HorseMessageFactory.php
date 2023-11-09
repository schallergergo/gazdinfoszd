<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HorseMessage>
 */
class HorseMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        $users = \App\Models\User::all();
        $horses = \App\Models\Horse::all();

        return [
            "user_id"=>$users->random()->id,
            "to_user_id"=>$users->random()->id,
            "read"=>rand(0,1),
            "horse_id"=>$horses->random()->id,
            "tenant_id"=>1,
            "message"=>fake()->text(20),
        ];
    }
}
