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
            'name'        => 'Calender1',
            'start_date'  => '20220830',
            'end_date'    => '20220901',
        ]);

        Calender::create([
            'name'        => 'Calender2',
            'start_date'  => '20220829',
            'end_date'    => '20220830',
        ]);
    }
}
