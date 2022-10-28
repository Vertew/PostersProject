<?php

namespace Database\Seeders;

use App\Models\Enclosure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnclosuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enclosure = new Enclosure;
        $enclosure->name = 'Enclosure One';
        $enclosure->save();

        Enclosure::factory()->has(\App\Models\Animal::factory()->count(10))->count(5)->create();

    }
}
