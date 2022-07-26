<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'job_id' => rand(1, 10),
            'student_id' => rand(1, 10),
            'year_experience' => rand(1, 5),
            'cv' => fake()->imageUrl(),
            'cover_letter' =>fake()->imageUrl(),
        ];
    }
}
