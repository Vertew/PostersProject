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
            'views' => fake()->numberBetween($min = 0, $max = 1000000),
            'image' => fake()->optional($weight = 0.5)->imageUrl($width= 640, $height = 480, 'cats', true, 'Faker'),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Insuring each post is related to an existing user.
        ];
    }
}
