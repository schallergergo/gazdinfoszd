<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horse;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    
  

    public function run()
    {
        $horses = array(
    'CHAPLIN ',
  'LEXUS',
  'PÓKER',
  'JOKER LT',
  'MERLIN',
  'POMPÁS',
  'HAJNAL',
  'SZELLŐ_NAGYPÓNI',
  'FÉLIX',
  'LUNA',
  'DING-DONG',
  'WIADORA ',
  'AJNA',
  'AZIZ',
  'MOGYORÓ',
  'HORÁC',
  'SMALL TURBÓ',
  'SZERGEJ',
  'MONTI-S',
  'MENTA'
);
        \App\Models\User::factory(10)->create();
        \App\Models\User::factory()->create(["email"=>"seitec01@gmail.com"]);
        \App\Models\Task::factory(10)->create();
        \App\Models\Owner::factory(10)->create();
         foreach ($horses as $horse) {
            $horse=\App\Models\Horse::factory()->create(["name"=>$horse]);
            \App\Models\Treatment::factory(20)->create(["date_of_treatment"=>"2023-".rand(1,12)."-01","horse_id"=>$horse->id]);
            \App\Models\HorseMessage::factory(20)->create(["horse_id"=>$horse->id]);
        }
         \App\Models\Rider::factory(10)->create();
        
         

         \App\Models\Tenant::factory(3)->create();

         for ($i=1;$i<13;$i++){
         \App\Models\Lesson::factory(20)->create(["date_of_lesson"=>"2023-".$i."-".rand(1,28)]);
        \App\Models\Income::factory(20)->create(["date"=>"2023-".$i."-".rand(1,28)]);
        \App\Models\Expense::factory(15)->create(["date"=>"2023-".$i."-".rand(1,28)]);

    }
         $horses = \App\Models\Horse::all();

        // Populate the pivot table
            \App\Models\Owner::all()->each(function ($owner) use ($horses) { 
            $owner->horse()->attach(
            $horses->random()->pluck('id')
    ); 
});
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
