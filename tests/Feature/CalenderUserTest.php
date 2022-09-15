<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\CalenderUser;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CalenderUserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_isAuthUserInCalender()
    {
        $this->seed();

        $calender1 = Calender::where('name', 'Calender1')->first();
        $calender2 = Calender::where('name', 'Calender2')->first();

        $user = User::where('name', 'takahashi')->first();
        Auth::shouldReceive('user')->andReturn($user);

        // Calender2にはtakahashiがいないが、Calender1にはtakahashiがいる。
        $this->assertFalse(CalenderUser::isAuthUserInCalender($calender2->id));
        $this->assertTrue(CalenderUser::isAuthUserInCalender($calender1->id));
    }

    public function test_registerAuthUserInCalender()
    {   
        $this->seed();
        $calender2 = Calender::where('name', 'Calender2')->first();

        $user = User::where('name', 'takahashi')->first();
        Auth::shouldReceive('user')->andReturn($user);

        $calenderUser = new CalenderUser();

        // 登録前
        $this->assertFalse(CalenderUser::isAuthUserInCalender($calender2->id));

        $calenderUser->registerAuthUserInCalender($calender2->id);

        // 登録後
        $this->assertTrue(CalenderUser::isAuthUserInCalender($calender2->id));
    }

    public function test_a_user_redirect_calender_show_page_if_calender_already_has_the_user()
    {
        $this->seed();
        $calender1 = Calender::where('name', 'Calender1')->first();
        $user = User::where('name', 'takahashi')->first();

        // すでにUserはCalenderに所属している。
        $this->assertTrue(CalenderUser::where('calender_id', $calender1->id)->where('user_id', $user->id)->count() > 0);

        $response = $this->actingAs($user)->get('/calender/' . $calender1->id . '/' .   Calender::generateToken($calender1->name));
        
        $response->assertRedirect('/calenders/'.$calender1->id);
    }

    public function test_a_user_join_calender_if_calender_doesnt_have_the_user()
    {
        $this->seed();
        $calender2 = Calender::where('name', 'Calender2')->first();
        $user = User::where('name', 'takahashi')->first();

        // この時点ではuserはCalenderに所属していない
        $this->assertFalse(CalenderUser::where('calender_id', $calender2->id)->where('user_id', $user->id)->count() > 0);

        $response = $this->actingAs($user)->get('/calender/' . $calender2->id . '/' . Calender::generateToken($calender2->name));
        
        // 所属した
        $this->assertTrue(CalenderUser::where('calender_id', $calender2->id)->where('user_id', $user->id)->count() > 0);
        $response->assertRedirect('/calenders/'.$calender2->id);
    }

    public function test_a_user_redirect_calender_index_page_if_token_is_invalid(){
        $this->seed();
        $calender2 = Calender::where('name', 'Calender2')->first();
        $user = User::where('name', 'takahashi')->first();
        $response = $this->actingAs($user)->get('/calender/' . $calender2->id . '/invalid_name');
        $response->assertRedirect('/calenders');
    }
}
