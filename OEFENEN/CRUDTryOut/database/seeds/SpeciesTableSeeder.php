<?php

use Illuminate\Database\Seeder;
use App\Species;
use App\Animal;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Species::truncate();

        Species::create(['name' => 'Chimpanzee', 'enclosure_name' => 'Chimpanzee Enclosure', 'area' => 'Africa']);
        Species::create(['name' => 'Gorilla', 'enclosure_name' => 'Gorilla Enclosure', 'area' => 'Africa']);
        Species::create(['name' => 'Jaguar', 'enclosure_name' => 'Jaguar Enclosure', 'area' => 'South-America']);
        Species::create(['name' => 'Red Panda', 'enclosure_name' => 'Red Panda Enclosure', 'area' => 'Asia']);
    }
}
