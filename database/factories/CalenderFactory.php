<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Calender>
 */
class CalenderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'start_date' => fake()->dateTimeBetween($startDate = 'now', $endDate = '+2 week'),
            'end_date'   => fake()->dateTimeBetween($startDate = '+2week', $endDate = '+4 week'), 
        ];
    }
}
