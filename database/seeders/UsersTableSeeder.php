<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
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
        $user->roles()->attach($roles->find(4));

        $user = new User;
        $user->username = "baduser";
        $user->email = "baduser@hotmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make("password3");
        $user->remember_token = Str::random(10);  
        $user->save();
        $user->roles()->attach($roles->find(1));
        $user->roles()->attach($roles->find(2));

        $user = new User;
        $user->username = "kait092";
        $user->email = "kait092@hotmail.com";
        $user->email_verified_at = now();
        $user->password = Hash::make("password4");
        $user->remember_token = Str::random(10);  
        $user->save();
        $user->roles()->attach($roles->find(3));

        User::factory()->has(\App\Models\Profile::factory())->count(30)->create();

        $users = User::Get();
        $randomArray = range(1,6);

        // A loop for attaching random roles to each user in a many-to-many fashion
        // without generating a large number of arbitrary (and unrealistic) fake roles
        for ($i = 5; $i <= $users->count(); $i++) {
            $users->find($i)->profile->image()->save(new Image);
            shuffle($randomArray);
            for ($j = 1; $j <= $randomArray[5]; $j++) {
                $users->find($i)->roles()->attach($roles->find($randomArray[$j-1]));
            }
        }
    }
}
