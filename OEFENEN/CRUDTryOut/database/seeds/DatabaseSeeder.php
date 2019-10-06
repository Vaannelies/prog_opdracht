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
        // $this->call(UsersTableSeeder::class);
    }
}
