<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal = new Animal;
        $animal->name = "John";
        $animal->weight = "250";
        $animal->save();

        $animal = new Animal;
        $animal->name = "PatrickBateman";
        $animal->weight = "700";
        $animal->save();

        Animal::factory()->count(50)->create();

    }
}
