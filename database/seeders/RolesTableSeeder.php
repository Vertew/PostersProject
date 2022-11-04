<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->role = "Restricted";
        $role->save();

        $role = new Role;
        $role->role = "Standard";
        $role->save();

        $role = new Role;
        $role->role = "Verified";
        $role->save();

        //$role->users()->attach(1);
        //$role->users()->attach(2);

        $role = new Role;
        $role->role = "Premium";
        $role->save();

        //$role->users()->attach(2);

        $role = new Role;
        $role->role = "Moderator";
        $role->save();

        //$role->users()->attach(1);

        $role = new Role;
        $role->role = "Admin";
        $role->save();





    }
}
