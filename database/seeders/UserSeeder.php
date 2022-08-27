<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'takahashi',
            'email'          => 'takahashi@email.com',
            'password'       => Hash::make('password1234'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name'           => 'satou',
            'email'          => 'satou@email.com',
            'password'       => Hash::make('password1234'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name'           => 'ikeda',
            'email'          => 'ikeda@email.com',
            'password'       => Hash::make('password1234'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name'           => 'suzuki',
            'email'          => 'suzuki@email.com',
            'password'       => Hash::make('password1234'),
            'remember_token' => Str::random(10),
        ]);
        
        User::create([
            'name'           => 'admin',
            'email'          => 'example@email.com',
            'password'       => Hash::make('password1234'),
            'remember_token' => Str::random(10),
        ]);
    }
}
