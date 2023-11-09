<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Horse;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {$horses = Horse::where("tenant_id",1)->get();
        return [
            "horse_id"=>$horses->random()->id,
            "date"=>fake()->date(),
            "amount"=>rand(10,300)*500,
            "category"=>fake()->randomElement(["treatment","breeding","assets","other"]),
            "tenant_id"=>1,
            "description"=>fake()->text(),

        ];
    }
}
