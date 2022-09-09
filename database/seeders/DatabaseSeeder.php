<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Calender;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // testでSeederを使用するため、Seederファイルに変更を加えた場合、Testを確認する必要あり。
        $this->call([
            UserSeeder::class,
            CalenderSeeder::class,
            CalenderUserSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
