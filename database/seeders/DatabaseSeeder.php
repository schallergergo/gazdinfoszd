<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Owner::factory(10)->create();
         \App\Models\Horse::factory(10)->create();
         \App\Models\Treatment::factory(10)->create();

         $horses = \App\Models\Horse::all();

        // Populate the pivot table
            \App\Models\Owner::all()->each(function ($owner) use ($horses) { 
            $owner->horses()->attach(
            $horses->random(rand(1, 3))->pluck('id')->toArray()
    ); 
});
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
