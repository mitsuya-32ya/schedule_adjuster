<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_calenders()
    {
        User::factory()
        ->has(Calender::factory()->count(3))
        ->create();

        $user = User::get();

        $this->assertCount(1, $user);
        $this->assertCount(3, $user->first()->calenders);
    }

    public function test_schedules()
    {
        $user = User::factory()
            ->has(
                Schedule::factory()
                    ->for(Calender::factory()->create())
                    ->count(1)
            )->create();

        $schedules = Schedule::get(); 
        
        $this->assertEquals($user->schedules, $schedules);
    }
}
