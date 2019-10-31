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

        $adminRole = Role::where('name', 'Admin')->first();
        $employeeRole = Role::where('name', 'Employee')->first();

        $admin = User::create([
            'firstname' => 'poep', 
            'lastname'  => 'van der poep',
            'email' => 'poep@hotmail.com', 
            'password' => Hash::make('poeppoep'),
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

        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($employeeRole);
    
    }
}
