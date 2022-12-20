<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = \App\Models\Role::Get();

        $user = new User;
        $user->username = "user1205";
        $user->email = "joe1205@hotmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make("password1");
        $user->remember_token = Str::random(10);  
        $user->save();
        $user->roles()->attach($roles->find(3));
        $user->roles()->attach($roles->find(4));
        $user->roles()->attach($roles->find(5));
        $user->roles()->attach($roles->find(6));

        $user = new User;
        $user->username = "mike999";
        $user->email = "mike999@gmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make("password2");
        $user->remember_token = Str::random(10);
        $user->save();
        $user->roles()->attach($roles->find(2));

        User::factory()->has(\App\Models\Profile::factory())->count(30)->create();

        $users = User::Get();
        $randomArray = range(1,6);

        // A loop for attaching random roles to each user in a many-to-many fashion
        // without generating a large number of arbitrary (and unrealistic) fake roles
        for ($i = 3; $i <= $users->count(); $i++) {
            shuffle($randomArray);
            for ($j = 1; $j <= $randomArray[5]; $j++) {
                $users->find($i)->roles()->attach($roles->find($randomArray[$j-1]));
            }
        }
    }
}
