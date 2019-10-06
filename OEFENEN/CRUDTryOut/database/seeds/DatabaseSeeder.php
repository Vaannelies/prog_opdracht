<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EnclosuresTableSeeder::class);
        $this->call(SpeciesTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
