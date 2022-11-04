<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'comment_text' => fake()->realText($maxNbChars = 500, $indexSize = 2),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'post_id' => \App\Models\Post::inRandomOrder()->first()->id,
        ];
    }
}
