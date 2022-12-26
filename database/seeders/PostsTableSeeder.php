<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post;
        $post->title = "First Post!!!";
        $post->post_text = "Hello this is my first post!!";
        $post->views = 10;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Image Post!!!!";
        $post->post_text = "This is a post with an image";
        $post->views = 15;
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Mike.";
        $post->post_text = "Hi Mike here :) :) :)";
        $post->views = 100;
        $post->user_id = 2;
        $post->save();

        $users = User::Get();

        $post->likes()->attach($users->find(1));

        Post::factory()->has(\App\Models\Comment::factory()->count(3))->count(50)->create();

    }
}
