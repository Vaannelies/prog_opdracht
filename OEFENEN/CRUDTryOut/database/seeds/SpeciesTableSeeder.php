<?php

use Illuminate\Database\Seeder;

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
        
        $chimpanzeeEnclosure = Enclosure::where('name', 'Chimpanzee Enclosure')->first();
        $gorillaEnclosure = Enclosure::where('name', 'Gorilla Enclosure')->first();
        $jaguarEnclosure = Enclosure::where('name', 'Jaguar Enclosure')->first();
        $redPandaEnclosure = Enclosure::where('name', 'Red Panda Enclosure')->first();
   
        $chipmanzee = Species::create([
            'name' => 'Chimpanzee'
        ]);

        $gorilla = Species::create([
            'name' => 'Gorilla'
        ]);

        $jaguar = Species::create([
            'name' => 'Jaguar'
        ]);

        $redPanda = Species::create([
            'name' => 'Red Panda'
        ]);

        $chimpanzee->attach($chimpanzeeEnclosure);
        $gorilla->attach($gorillaEnclosure);
        $jaguar->attach($jaguarEnclosure);
        $redPanda->attach($redPandaEnclosure);
    }
}
