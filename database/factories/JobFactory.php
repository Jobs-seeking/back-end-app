<?php

namespace Database\Factories;

use App\Models\JobType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $companies = User::where('role','company')->get();
        $length = $companies->count();
        $lengthJobType = JobType::all()->count();
        return [
            'company_id' =>$companies[$this->faker->numberBetween(0,$length-1)]->id,
            'job_type_id' =>JobType::all()[$this->faker->numberBetween(0, $lengthJobType-1)]->id,
        ];
    }
}
