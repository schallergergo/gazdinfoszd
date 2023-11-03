<?php

namespace Database\Factories;
use App\Models\Horse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $horses = Horse::where("tenant_id",1)->get();
        return [
            "horse_id"=>$horses->random()->id,
            "date"=>fake()->date(),
            "amount"=>rand(10,300)*500,
            "category"=>fake()->randomElement(["lesson","boarding","breeding","other"]),
            "tenant_id"=>1,
            "description"=>fake()->text(),

        ];
    }
}
