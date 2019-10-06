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
        DB::table('species_animal')->truncate();
        
        $chimpanzeeSpecies = Species::where('name', 'Chimpanzee')->first();
        $gorillaSpecies = Species::where('name', 'Gorilla')->first();
        $jaguarSpecies = Species::where('name', 'Jaguar')->first();
        $redPandaSpecies = Species::where('name', 'Red Panda')->first();
   
        $bella = Species::create([
            'name' => 'Bella',
            'date_birth' => '2019-02-03',
            'gender' => 'female',
            'species_id' => $redPandaSpecies['id']
        ]);

        $oscar = Species::create([
            'name' => 'Oscar',
            'date_birth' => '2019-02-03',
            'gender' => 'male',
            'species_id' => $redPandaSpecies['id']
        ]);

        $harold = Species::create([
            'name' => 'Harold',
            'date_birth' => '2019-02-03',
            'gender' => 'male',
            'species_id' => $redPandaSpecies['id']
        ]);

        $fiona = Species::create([
            'name' => 'Fiona',
            'date_birth' => '2019-02-03',
            'gender' => 'female',
            'species_id' => $redPandaSpecies['id']
        ]);

        $bella->species()->attach($chimpanzeeSpecies['id']);
        $oscar->species()->attach($gorillaSpecies['id']);
        $harold->species()->attach($jaguarSpecies);
        $fiona->species()->attach($redPandaSpecies);

    }
}


