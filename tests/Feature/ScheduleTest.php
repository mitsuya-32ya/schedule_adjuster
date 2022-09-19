<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Cast;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    use DatabaseMigrations;

    public function test_user()
    {
        $user = User::factory()
            ->has(
                Schedule::factory()
                    ->for(Calender::factory()->create())
                    ->count(1)
            )->create();

        $schedule = Schedule::first(); 
        
        $this->assertSame($user->name, $schedule->user->name);
    }

    public function test_calender()
    {
        $calender = Calender::factory()
            ->has(Schedule::factory()->count(1))
            ->create();
        
        $schedule = Schedule::first();

        $this->assertSame($calender->name, $schedule->calender->name);
    }

    public function test_isOldSchedules()
    {
        $this->seed();

        $calender1 = Calender::where('name', 'Calender1')->first();
        $calender2 = Calender::where('name', 'Calender2')->first();

        $user = User::where('name', 'takahashi')->first();
        Auth::shouldReceive('user')->andReturn($user);

        $this->assertTrue(Schedule::isOldSchedules($calender1->id));
        $this->assertFalse(Schedule::isOldSchedules($calender2->id));
    }

    public function test_user_can_get_schedule_create_page_only_if_calender_has_user()
    {
        $this->seed();
        $calender1 = Calender::where('name', 'Calender1')->first();
        $calender2 = Calender::where('name', 'Calender2')->first();

        $user = User::where('name', 'takahashi')->first();

        $getCreatePage = $this->actingAs($user)->get("/calenders/create/{$calender1->id}/schedules/create");
        $getCreatePage->assertViewIs('schedules.create');
    }
}
