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

    public function test_horse_create_page_can_be_rendered()
    {

        $response = $this
            ->get('/horse/create');

        $response->assertSee("Rendered");
    }

    public function test_horse_can_be_stored_with_all_data()
    {
        session()->put("tenant_id",1);
        $response = $this->post('/horse/store', [
             "name" => "Lovacska",
            "birthdate" => "2022-01-01",
            "gender"=> "mare",
            "passport_number" => "HU 135444 554",
            "FEI_number" => "2525258",
            "color" => "white",
            "comments" => "Hello. this is some data!"
        ]);
        $response->assertSessionHasNoErrors();

    }

    public function test_horse_cannot_be_stored_without_a_name()
    {

        $response = $this->post('/horse/store', [
            "birthdate" => "2022-01-01",
            "gender"=> "mare",
            "passport_number" => "HU 135444 554",
            "FEI_number" => "2525258",
            "color" => "white",
            "data" => "Hello. this is some data!"
        ]);
        $response->assertInvalid("name");


    }


     public function test_horse_can_be_stored_with_a_name()
    {

        $response = $this->post('/horse/store', [
            "name" => "Lovacska",
        ]);
        $response->assertSessionHasNoErrors();
        $response->assertValid("name");

    }

    public function test_horse_update_page_can_be_rendered()
    {
        $horse = Horse::factory()->create();
        $response = $this
            ->get('/horse/edit/'.$horse->id);

        $response->assertSee($horse->name);
    }

    public function test_horse_name_can_be_updated()
    {
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->name,"Lovacska");

    }
    public function test_color_can_be_updated()
    {   $data="pej";
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
            "color" => $data,
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->color,$data);

    }

    public function test_gender_can_be_updated()
    {   $data="none";
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
            "gender" => $data,
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->gender,$data);

    }

    public function test_passport_number_can_be_updated()
    {   $data="none";
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
            "passport_number" => $data,
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->passport_number,$data);

    }

    public function test_FEI_number_can_be_updated()
    {   $data="none";
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
            "FEI_number" => $data,
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->FEI_number,$data);

    }

    public function test_comments_name_can_be_updated()
    {   $data="none";
        $horse = Horse::factory()->create();

        $response = $this->patch('/horse/update/'.$horse->id, [
            "name" => "Lovacska",
            "comments" => $data,
        ]);
        $horse=Horse::find($horse->id);
        $this->assertEquals($horse->comments,$data);

    }

}
