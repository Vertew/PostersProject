<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'post_text' => fake()->realText($maxNbChars = 1000, $indexSize = 2),
            'image' => fake()->optional($weight = 0.5)->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker'),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Assigning each post a random user from the existing users
        ];
    }
}
