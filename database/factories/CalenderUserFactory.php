<?php

namespace Database\Factories;

use App\Models\Calender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CalenderUser>
 */
class CalenderUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'calender_id' => Calender::factory()->create(),
            'user_id' => User::factory()->create(),
        ];
    }
}
