<?php

namespace Database\Seeders;

use App\Models\Post;
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
        $post->post_text = "Hello this is my first post!!";
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->post_text = "This is a post with an image";
        $post->image = "image/location";
        $post->user_id = 2;
        $post->save();

        $post = new Post;
        $post->post_text = "Hi Mike here :) :) :)";
        $post->user_id = 2;
        $post->save();

    }
}
