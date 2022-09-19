<?php

namespace Database\Seeders;

use App\Models\CalenderUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalenderUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CalenderUser::create([
            'calender_id' => 1,
            'user_id'     => 1,
        ]);
        CalenderUser::create([
            'calender_id' => 1,
            'user_id'     => 2,
        ]);
        CalenderUser::create([
            'calender_id' => 3,
            'user_id'     => 1,
        ]);
    }
}
