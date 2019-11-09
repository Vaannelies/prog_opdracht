<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Species;


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

        $adminRole = Role::where('name', 'Admin')->first();
        $employeeRole = Role::where('name', 'Employee')->first();

        $admin = User::create([
            'firstname' => 'paap', 
            'lastname'  => 'van der paap',
            'email' => 'paap@hotmail.com', 
            'password' => Hash::make('paappaap'),
            'gender'    => 'Other',
            'active'    => '1',
            'date_birth'    => '2010-10-10',
            'employee_since' => '2010-10-10',

            ]);
            
    
        $employee = User::create([
            'firstname' => 'Piet', 
            'lastname'  => 'Pietersen',
            'email' => 'piet@hotmail.com', 
            'password' => Hash::make('pietpiet'),
            'gender'    => 'Other',
            'active'    => '1',
            'date_birth'    => '2010-10-10',
            'employee_since' => '2010-10-10',

            ]);

        $employeeTwo = User::create([
            'firstname' => 'Nel', 
            'lastname'  => 'van Driel',
            'email' => 'nel@hotmail.com', 
            'password' => Hash::make('nelnel'),
            'gender'    => 'Female',
            'active'    => '0',
            'date_birth'    => '2001-06-10',
            'employee_since' => '2022-11-10',

            ]);



        $admin->roles()->attach($adminRole);
        $employee       ->roles()->attach($employeeRole);
        $employeeTwo    ->roles()->attach($employeeRole);
    
    }
}
