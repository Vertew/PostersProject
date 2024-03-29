<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = new Profile;
        $profile->name = "Joe Smith";
        $profile->date_of_birth = '1979-06-09';
        $profile->status = "Relaxing.";
        $profile->location = "London";
        $profile->user_id = 1;
        $profile->save();

        $profile = new Profile;
        $profile->name = "Mike Grey";
        $profile->status = "Hi i'm mike :)";
        $profile->user_id = 2;
        $profile->save();

        $profile = new Profile;
        $profile->name = "Richard Hope";
        $profile->status = "Argh";
        $profile->user_id = 3;
        $profile->save();
        $profile->image()->save(new Image);

        $profile = new Profile;
        $profile->name = "Kaitlyn Jones";
        $profile->date_of_birth = '1999-03-03';
        $profile->status = "Status";
        $profile->location = "Swansea";
        $profile->user_id = 4;
        $profile->save();
        $profile->image()->save(new Image);

        //Profile::factory()->count((\App\Models\User::Get()->count())-2)->create();
    }
}

