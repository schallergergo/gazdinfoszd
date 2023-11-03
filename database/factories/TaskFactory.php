<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $time1=fake()->datetime();
        $time2=fake()->datetime();
        return [
            "task" => fake()->text(20),
            "task_start" => fake()->datetime(min($time1,$time2)),
            "task_end" => fake()->datetime(max($time1,$time2)),
            'tenant_id' => rand(1,3),
        ];
    }
}

