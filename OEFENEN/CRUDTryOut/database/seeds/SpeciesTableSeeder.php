<?php

use Illuminate\Database\Seeder;
use App\Species;
use App\Animal;
use App\User;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('species_user')->truncate();
        $pietUser = User::where('firstname', 'Piet')->first();
        $nelUser  = User::where('firstname', 'Nel')->first();
    

        Species::truncate();

        Species::create(['name' => 'Chimpanzee', 'enclosure_name' => 'Chimpanzee Enclosure', 'area' => 'Africa']);
        $gorillaSpecies = Species::create(['name' => 'Gorilla', 'enclosure_name' => 'Gorilla Enclosure', 'area' => 'Africa']);
        $jaguarSpecies = Species::create(['name' => 'Jaguar', 'enclosure_name' => 'Jaguar Enclosure', 'area' => 'South-America']);
        Species::create(['name' => 'Red Panda', 'enclosure_name' => 'Red Panda Enclosure', 'area' => 'Asia']);

        $gorillaSpecies      ->users()->attach($pietUser);
        $jaguarSpecies       ->users()->attach($nelUser);
    }
}
