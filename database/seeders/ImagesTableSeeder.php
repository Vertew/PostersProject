<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
use App\Models\Profile;
use App\Models\Post;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = Profile::find(31);
        $image = new Image;
        $image->name = "Joe.png";
        $profile->image()->save($image);

        $profile = Profile::find(32);
        $image = new Image;
        $image->name = "WaterProfileImage2.jpg";
        $profile->image()->save($image);

        $post = Post::find(2);
        $image = new Image;
        $image->name = "ExampleImage.png";
        $post->image()->save($image);
    }
}
