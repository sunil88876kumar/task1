<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'rating' => rand(1, 5),
            'price' => $this->faker->randomNumber(2) * 100,
            'is_published' => $this->faker->boolean,
            'category' => Arr::random(['teaching-and-learning', 'staff-and-recruitment', 'safeguarding', 'mental-health', 'health-and-safety'])
        ];
    }

    public function published(): CourseFactory
    {
        return $this->state(function () {
            return [
                'is_published' => true,
            ];
        });
    }
}
