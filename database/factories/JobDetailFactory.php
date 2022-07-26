<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobDetail>
 */
class JobDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'required' => $this->faker->text(500),
            'technical' => $this->faker->text(500),
            'salary' => $this->faker->randomDigit(),
            'deadline' => $this->faker->dateTime(),
            'job_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
