<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role = [
        	
            	[
                	'name' => 'admin',
                	'display_name' => 'System Administrator',
                	'description' => 'The system administrator'
            	],
           		[
                	'name' => 'employee',
                	'display_name' => 'Employee Role',
                	'description' => 'An individual with employee role'
            	],
            	[
                	'name' => 'Volunteer',
                	'display_name' => 'Volunteer Role',
                	'description' => 'An individual with volunteer role'
            	]
         	];

        foreach ($role as $key => $value) {
        	Role::create($value);
        }
    }
}

/*got error: This cache store does not support tagging when running php artisan db:seed*/