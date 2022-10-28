<?php

namespace Database\Seeders;

use App\Models\EmergencyContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmergencyContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new EmergencyContact;
        $contact->name = 'James';
        $contact->phone_number = '914-124-0943';
        $contact->animal_id = '1';
        $contact->save();

        EmergencyContact::factory()->count(50)->create();


    }
}
