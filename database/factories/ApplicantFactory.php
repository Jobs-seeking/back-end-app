<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
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
        $students = User::where('role', 'student')->get();
        $lengthStd = $students->count();
        $jobs = Job::all();
        $lengthjobs = $jobs->count();
        return [
            'job_id' => $jobs[$this->faker->numberBetween(0, $lengthjobs-1)]->id,
            'student_id' => $students[$this->faker->numberBetween(0, $lengthStd-1)]->id,
            'year_experience' => $this->faker->numberBetween(0, 3),
            'cv' => $this->faker->imageUrl(640, 480, 'job_cv', true),
            'cover_letter' =>$this->faker->imageUrl(640, 480, 'job_cover_letter', true),
        ];
    }
}
