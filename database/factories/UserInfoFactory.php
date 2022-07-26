<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string(), mixed>
     */
    public function definition()
    {
        $status = ['active', 'unactive'];
        $role = ['student', 'admin', 'company'];
        return [
            'email' => fake()->email(),
            'password' => fake()->password(),
            'name' => fake()->name(),
            'dateOfBirth' => fake()->dateTime(),
            'phone' => fake()->phoneNumber(),
            'description' => fake()->paragraphs(),
            'address' => fake()->address(),
            'stutus' => $status[rand(0,1)],
            'role' => $role[rand(0,2)],
        ];
    }
}
