<?php

namespace Database\Seeders;

use App\Models\Calender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calender::create([
            'start_date'  => '20220830',
            'end_date'    => '20220901',
        ]);
    }
}
