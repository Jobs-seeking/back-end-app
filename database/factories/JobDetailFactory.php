<?php

namespace Database\Factories;

use App\Models\Job;
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
        $jobs = Job::all();
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'required' => $this->faker->text(500),
            'technical' => $this->faker->text(100),
            'salary' => $this->faker->randomDigit(),
            'deadline' => $this->faker->dateTime(),
            'job_id' => $jobs[$this->faker->unique()->numberBetween(0,($jobs->count())-1)]->id,
        ];
    }
}
