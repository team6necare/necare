<?php
use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
                  	
            [
                'name' => 'user-read',
                'display_name' => 'Display User Listing',
                'description' => 'See only Listing Of Users'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-edit',
                'display_name' => 'Edit User',
                'description' => 'Edit User'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],


            [
        		'name' => 'role-read',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],


        	[
        		'name' => 'cancer_type-read',
        		'display_name' => 'Display List of Cancer Types',
        		'description' => 'See only Listing Of Cancer Type'
        	],
        	[
        		'name' => 'cancer_type-create',
        		'display_name' => 'Create Cancer Types',
        		'description' => 'Create New Cancer Types'
        	],
        	[
        		'name' => 'cancer_type-edit',
        		'display_name' => 'Edit Cancer Types',
        		'description' => 'Edit Cancer Types'
        	],
        	[
        		'name' => 'cancer_type-delete',
        		'display_name' => 'Delete Cancer Types',
        		'description' => 'Delete Cancer Types'
        	],


            [
                'name' => 'location-read',
                'display_name' => 'Display List of Location',
                'description' => 'See only Listing of Location'
            ],
            [
                'name' => 'Location-create',
                'display_name' => 'Create Location',
                'description' => 'Create New Location'
            ],
            [
                'name' => 'Location-edit',
                'display_name' => 'Edit Location',
                'description' => 'Edit Location'
            ],
            [
                'name' => 'Location-delete',
                'display_name' => 'Delete Location',
                'description' => 'Delete Location'
            ]

        ];

        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}