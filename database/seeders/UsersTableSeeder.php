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

        User::factory()->has(\App\Models\Profile::factory())->count(30)->create();

        $users = User::Get();
        $roles = \App\Models\Role::Get();
        $randomArray = range(1,6);

        // A for loop for attaching random roles to each user in a many-to-many fashion
        // without generating a large number of arbitrary (and unrealistic) fake roles
        for ($x = 1; $x <= $users->count(); $x++) {
            shuffle($randomArray);
            for ($i = 1; $i <= $randomArray[5]; $i++) {
                $users->find($x)->roles()->attach($roles->find($randomArray[$i-1]));
            }
        }
    }
}
