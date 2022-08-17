<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserInfo>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string(), mixed>
     */
    public function definition()
    {
        $status = ['active', 'inactive'];
        $role = ['student', 'admin', 'company'];
        $genders = ['male', 'female'];
        $level = ['second-year student', 'third-year student'];
        return [
            'email' =>$this->faker->email(),
            'password' =>Hash::make($this->faker->bothify('########')),
            'name' =>$this->faker->name(),
            'gender'=>$genders[$this->faker->numberBetween(0,1)],
            'level' => $level[$this->faker->numberBetween(0,1)],
            'image' =>$this->faker->imageUrl(640, 480, 'avatar', true),
            'dateOfBirth' => $this->faker->dateTime(),
            'phone' => $this->faker->phoneNumber(),
            'description' => $this->faker->text(),
            'address' => $this->faker->address(),
            'status' => $status[$this->faker->numberBetween(0,1)],
            'role' => $role[$this->faker->numberBetween(0,2)],
        ];
    }
}
