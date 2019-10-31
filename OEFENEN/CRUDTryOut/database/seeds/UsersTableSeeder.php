<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();

        $admin = User::create([
            'name' => 'poep', 
            'email' => 'poep@hotmail.com', 
            'password' => Hash::make('poeppoep')
            ]);
            
    
        $employee = User::create([
            'name' => 'Piet', 
            'email' => 'piet@hotmail.com', 
            'password' => Hash::make('pietpiet')
            ]);

        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($employeeRole);
    
    }
}
