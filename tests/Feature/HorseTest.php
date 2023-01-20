<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Horse;
use App\Models\Owner;

class HorseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_horses_can_have_owners_added()
    {
        $horse=$this->createHorseWithOwners();
        $this->assertEquals($horse->owners->count(),3);
    }
    public function test_horses_can_have_owners_removed()
    {
        $horse=Horse::all()->first();
        $owner=$horse->owners->first();
        $horse->owners()->detach($owner);
        $horse=Horse::all()->first();
        $owners=$horse->owners;
        $this->assertEquals(count($owners),2);
    }

    public function createHorseWithOwners(){
        Horse::factory()->create();
        Owner::factory(3)->create();
        $horse=Horse::first();
        $owners=Owner::where("id","<",4)->get();
        $horse->owners()->attach($owners);
        return $horse;
    }


}
