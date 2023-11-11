<?php

namespace Database\Factories;
use App\Models\Venue;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $time1 = fake()->time();
        $time2 = fake()->time();
        return [
            'description' => fake()->text(10),
            'venue_id'=> Venue::all()->random()->id,
            "event_day" => fake()->date(),
            'start' => min($time1,$time2),
            'end' => max($time1,$time2),
            'tenant_id' => 1,
        ];
    }
}
