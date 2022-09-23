<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

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
    public function test_getCalendersAuthUserBelongsTo()
    {
        $this->seed();

        $user = User::where('name', 'takahashi')->first();
        Auth::shouldReceive('user')->andReturn($user);

        $this->assertEquals(User::getCalendersAuthUserBelongsTo()->count(), 2);
    }
}
