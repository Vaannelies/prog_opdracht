<?php

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
        Enclosure::truncate();

        Enclosure::create(['name' => 'Chimpanzee Enclosure', 'area' => 'Africa']);
        Enclosure::create(['name' => 'Gorilla Enclosure', 'area' => 'Africa']);
        Enclosure::create(['name' => 'Jaguar Enclosure', 'area' => 'South-America']);
        Enclosure::create(['name' => 'Red Panda Enclosure', 'area' => 'Asia']);
    }
}
