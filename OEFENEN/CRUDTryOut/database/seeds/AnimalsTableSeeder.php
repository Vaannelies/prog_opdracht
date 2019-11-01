<?php

use Illuminate\Database\Seeder;
use App\Animal;
use App\Species;

class AnimalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        Animal::truncate();
        
        $chimpanzeeSpecies = Species::where('name', 'Chimpanzee')->first();
        $gorillaSpecies = Species::where('name', 'Gorilla')->first();
        $jaguarSpecies = Species::where('name', 'Jaguar')->first();
        $redPandaSpecies = Species::where('name', 'Red Panda')->first();
   
        $hiya = Animal::create([
            'name' => 'Hiya',
            'date_birth' => '2019-02-03',
            'gender' => 'Female',
            'species_id' => $chimpanzeeSpecies['id'],
            'food' => 'fruit'
        ]);

        $monini = Animal::create([
            'name' => 'Monini',
            'date_birth' => '2019-02-03',
            'gender' => 'Male',
            'species_id' => $gorillaSpecies['id'],
            'food' => 'fruit'
        ]);

        $veno = Animal::create([
            'name' => 'Veno',
            'date_birth' => '2019-02-03',
            'gender' => 'Male',
            'species_id' => $jaguarSpecies['id'],
            'food' => 'fruit'
        ]);

        $kara = Animal::create([
            'name' => 'Kara',
            'date_birth' => '2019-02-03',
            'gender' => 'Female',
            'species_id' => $redPandaSpecies['id'],
            'food' => 'fruit'
        ]);

        $hiya = Animal::create([
            'name' => 'June',
            'date_birth' => '2001-02-16',
            'gender' => 'Female',
            'species_id' => $jaguarSpecies['id'],
            'food' => "McFlurry M&M's"
        ]);

    }
}


