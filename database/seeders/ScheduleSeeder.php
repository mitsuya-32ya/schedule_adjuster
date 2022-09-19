<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'date'        => '20220830',
            'calender_id' => 1,
            'user_id'     => 1,
            'start_time'  => '08:00:00',
            'end_time'    => '10:00:00',
        ]);
        Schedule::create([
            'date'        => '20220831',
            'calender_id' => 1,
            'user_id'     => 1,
        ]);
        Schedule::create([
            'date'        => '20220901',
            'calender_id' => 1,
            'user_id'     => 1,
            'start_time'  => '00:00:00',
            'end_time'    => '23:59:00',
        ]);
        Schedule::create([
            'date'        => '20220830',
            'calender_id' => 1,
            'user_id'     => 2,
            'start_time'  => '00:00:00',
            'end_time'    => '23:59:00',
        ]);
        Schedule::create([
            'date'        => '20220831',
            'calender_id' => 1,
            'user_id'     => 2,
        ]);
        Schedule::create([
            'date'        => '20220901',
            'calender_id' => 1,
            'user_id'     => 2,
            'start_time'  => '00:00:00',
            'end_time'    => '23:59:00',
        ]);
    }
}
