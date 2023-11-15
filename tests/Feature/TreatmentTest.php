<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Treatment;

class TreatmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_we_can_create_a_treatment()
    {
        
        $treatment = Treatment::factory(1)->create();
        $this->assertEquals(1,count($treatment));
    }

        public function test_a_treatment_has_a_horse_linked()
    {
        
        $horse= Treatment::factory()->create()->horse;
        $this->assertNotNull($horse);
    }

       
}
