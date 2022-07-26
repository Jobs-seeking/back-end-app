<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        $status = ['active', 'inactive'];
        $role = ['student', 'admin', 'company'];
        return [
            'email' =>$this->faker->email(),
            'password' =>$this->faker->bothify('########'),
            'name' =>$this->faker->name(),
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
