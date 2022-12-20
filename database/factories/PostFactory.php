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

            'title' => fake()->realText($maxNbChars = 20, $indexSize = 2),
            'post_text' => fake()->realText($maxNbChars = 1000, $indexSize = 2),
            'views' => fake()->numberBetween($min = 0, $max = 1000000),
            // Fakers' image generation is a bit tempremental so this isn't working at the moment.
            'image' => fake()->optional($weight = 0.5)->image($dir = public_path('images'), $width= 640, $height = 480, $fullPath = false),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id, // Insuring each post is related to an existing user.
        ];
    }
}
