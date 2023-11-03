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
        \App\Models\User::factory()->create(["email"=>"seitec01@gmail.com"]);
        \App\Models\Owner::factory(10)->create();
         \App\Models\Horse::factory(10)->create();
         \App\Models\Rider::factory(10)->create();
        
         \App\Models\Task::factory(10)->create();

         \App\Models\Tenant::factory(3)->create();

         for ($i=1;$i<13;$i++){
         \App\Models\Lesson::factory(20)->create(["date_of_lesson"=>"2023-".$i."-01"]);
        \App\Models\Treatment::factory(20)->create(["date_of_treatment"=>"2023-".$i."-01"]);
        \App\Models\Income::factory(20)->create(["date"=>"2023-".$i."-01"]);
    }
         $horses = \App\Models\Horse::all();

        // Populate the pivot table
            \App\Models\Owner::all()->each(function ($owner) use ($horses) { 
            $owner->horse()->attach(
            $horses->random(rand(1, 3))->pluck('id')->toArray()
    ); 
});
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
