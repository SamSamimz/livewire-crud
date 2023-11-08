<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement([1,2]),
            'name' => fake()->name,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'gender' => fake()->randomElement(['male','female']),
            'address' => fake()->city,
            'dob'   => fake()->date('Y-m-d'),
            'image' => 'https://fakeimg.pl/50',
        ];
    }
}
