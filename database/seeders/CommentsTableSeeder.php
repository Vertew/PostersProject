<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment;
        $comment->comment_text = "I am commenting on my own post!!";
        $comment->views = 3;
        $comment->user_id = 1;
        $comment->post_id = 1;
        $comment->save();

        $comment = new Comment;
        $comment->comment_text = "This is a cool post.";
        $comment->views = 5;
        $comment->user_id = 2;
        $comment->post_id = 1;
        $comment->save();

        $comment = new Comment;
        $comment->comment_text = "This is my post :)";
        $comment->views = 10;
        $comment->user_id = 2;
        $comment->post_id = 2;
        $comment->save();

        //Comment::factory()->count(100)->create();

    }
}
