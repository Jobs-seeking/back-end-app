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
            'job_id' => $this->faker->numberBetween(1, 10),
            'student_id' => $this->faker->numberBetween(1, 10),
            'year_experience' => $this->faker->numberBetween(1, 5),
            'cv' => $this->faker->imageUrl(640, 480, 'job_cv', true),
            'cover_letter' =>$this->faker->imageUrl(640, 480, 'job_cover_letter', true),
        ];
    }
}
