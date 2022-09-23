<?php

namespace Database\Factories;

use App\Models\Calender;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),
            'calender_id' => Calender::factory()->create(),
            'user_id' => User::factory()->create(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
        ];
    }
}
