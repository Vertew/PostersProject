<?php

namespace Database\Seeders;

use App\Models\Keeper;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeepersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keeper = new Keeper;
        $keeper->name = 'Dwayne';
        $keeper->save();

        $keeper->animals()->attach(1);
        $keeper->animals()->attach(2);

        $animals = Animal::factory()->count(5)->create();
        Keeper::factory()->hasAttached($animals)->count(5)->create();
    }
}
