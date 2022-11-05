<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        $profile->DoB = '1979-06-09';
        $profile->status = "Relaxing.";
        $profile->location = "London";
        $profile->profile_picture = "Joe/Image.jpg";
        $profile->user_id = 1;
        $profile->save();

        $profile = new Profile;
        $profile->name = "Mike Grey";
        $profile->status = "Hi i'm mike :)";
        $profile->user_id = 2;
        $profile->save();

        /**  
         * Below is a way of adding profiles without using a factory relationship method since the
         * since the factory requires that each user_id being seeded by faker is unique.
         * Profile::factory()->count((\App\Models\User::Get()->count())-2)->create();
         */
    }
}

