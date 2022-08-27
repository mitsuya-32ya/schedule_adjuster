<?php

namespace Tests\Feature;

use App\Models\Calender;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalenderTest extends TestCase
{
    use RefreshDatabase;

    public function test_users()
    {
        Calender::factory()
            ->has(User::factory()->count(3))
            ->create();
        
        $calender = Calender::get();

        $this->assertCount(1, $calender);
        $this->assertCount(3, $calender->first()->users);
    }

}