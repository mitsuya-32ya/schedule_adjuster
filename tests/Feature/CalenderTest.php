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

class CalenderTest extends TestCase
{
    use DatabaseMigrations;

    public function test_users()
    {
        Calender::factory()
            ->has(User::factory()->count(3))
            ->create();
        
        $calender = Calender::get();

        $this->assertCount(1, $calender);
        $this->assertCount(3, $calender->first()->users);
    }

    public function test_schedules()
    {
        Calender::factory()
            ->has(Schedule::factory()->count(3))
            ->create();

        $calender = Calender::get();

        $this->assertCount(4, $calender);
        $this->assertCount(3, $calender->first()->schedules);
    }

    public function test_dates()
    {
        $calender = Calender::factory()
            ->create([
                'start_date' => '20220829',
                'end_date'   => '20220904',
            ]);
        $dates = Calender::dates($calender);
        
        $this->assertCount(7, $dates);
    }

    public function test_getSchedulesAt()
    {
        // 2022/08/29時点でseederではtakahashi, satou の二人がCalender1に所属している。
        $this->seed();
        $calender = Calender::where('name', 'Calender1')->first();

        $scheduleAt = $calender->getSchedulesAt('2022-08-30');

        $this->assertCount(2, $scheduleAt);
    }

    public function test_getAuthUserScheduleAt()
    {
        $this->seed();
        $calender = Calender::where('name', 'Calender1')->first();

        $user = User::where('name', 'takahashi')->first();

        // MockでAuth::userを$userと設定している。
        Auth::shouldReceive('user')->andReturn($user);

        $AuthUserScheduleAt = $calender->getAuthUserScheduleAt('2022-08-30');
        $this->assertEquals('takahashi', $AuthUserScheduleAt->user->name);
    }

    public function test_isAuthUserBelongsToCalender()
    {
        $this->seed();

        $calender1 = Calender::where('name', 'Calender1')->first();
        $calender2 = Calender::where('name', 'Calender2')->first();

        $user = User::where('name', 'takahashi')->first();
        Auth::shouldReceive('user')->andReturn($user);

        $this->assertTrue(boolval($calender1->isAuthUserBelongsToCalender()));
        $this->assertFalse(boolval($calender2->isAuthUserBelongsToCalender()));
    }


    public function test_a_user_can_get_calender_index_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/calenders');
        
        $response->assertSuccessful();
    }

    public function test_a_user_can_get_calender_show_page_only_if_calender_has_the_user()
    {
        $this->seed();

        $user = User::where('name', 'takahashi')->first();

        $responseIfCalenderHasTheUser = $this->actingAs($user)->get('/calenders/1');
        $responseIfCalenderHasTheUser->assertViewIs('calenders.show');

        $responseIfCalenderDoesntHaveTheUser = $this->actingAs($user)->get('/calenders/2');
        $responseIfCalenderDoesntHaveTheUser->assertViewIs('errors.403');
    }
}
