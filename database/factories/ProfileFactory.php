<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => fake()->optional($weight = 0.85)->name(),
            'DoB' => fake()->optional($weight = 0.85)->date(),
            'status' => fake()->optional($weight = 0.85)->realText($maxNbChars = 30, $indexSize = 2),
            'location' => fake()->optional($weight = 0.85)->country(),
            'profile_picture' => fake()->optional($weight = 0.85, $default = 'default/profile/image.png')->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker'),
            'user_id' => fake()->unique()->numberBetween(3,\App\Models\User::Get()->count()),

        ];
    }
}
