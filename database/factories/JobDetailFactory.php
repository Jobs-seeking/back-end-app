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
        $status = ['active', 'unactive'];
        return [
            'title' => fake()->name(),
            'description' => fake()->paragraphs(),
            'required' => fake()->paragraphs(),
            'technical' => fake()->paragraphs(),
            'salary' => rand(1000, 9999),
            'deadline' => fake()->dateTime(),
            'stutus' => $status[rand(0,1)],
            'job_id' => rand(1,10),

        ];
    }
}
