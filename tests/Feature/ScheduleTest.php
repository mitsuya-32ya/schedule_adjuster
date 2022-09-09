<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
