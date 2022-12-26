<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image = new Image;
        $image->name = "Joe.png";
        $image->imageable_id = 31;
        $image->imageable_type = "Profile";
        $image->save();

        $image = new Image;
        $image->name = "WaterProfileImage2.jpg";
        $image->imageable_id = 1;
        $image->imageable_type = "Post";
        $image->save();
    }
}
