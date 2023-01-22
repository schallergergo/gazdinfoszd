<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_have_tasks_linked()
    {
        $user = \App\Models\User::find(1);
        $task = \App\Models\Task::factory(2)->create();

        $user->tasks()->attach($task);

        $this->assertEquals(2,$user->tasks);
    }
}
