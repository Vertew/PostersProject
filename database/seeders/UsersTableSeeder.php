<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = "user1205";
        $user->email = "joe1205@hotmail.com";
        $user->password = "password1";
        $user->save();

        $user = new User;
        $user->username = "mike999";
        $user->email = "mike999@gmail.com";
        $user->password = "password2";
        $user->save();

    }
}
