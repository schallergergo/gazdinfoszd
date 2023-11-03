<?php

namespace Database\Factories;
use App\Models\Horse;
use App\Models\Rider;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $horses = Horse::all();
        $riders = Rider::all();
        $rider = $riders->random();
        return [
            "date_of_lesson"=>fake()->date(),
            "rider_id"=>$rider->id,
            "horse_id"=>$horses->random()->id,
            "tenant_id"=>1,
            "price_of_lesson"=>$rider->normal_price,
            
        ];
    }
}
