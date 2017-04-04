<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Role;
use App\Permission;

class UsersTableSeeder extends Seeder {

    public function run()
    {
		DB::table('users')->delete();
        User::create([  'name' => 'Chandapiwa Mpuchane', 'password' => bcrypt('secret'), 'email' => 'cmpuchanemolefha@unomaha.edu',
        'created_at' => date_create(), 'updated_at' => date_create()]);
      
    }
}

class RolesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        Role::create([ 'name' => 'admin', 'display_name' => 'System Administrator', 'description' => 'The system administrator user who is allowed to manage and edit other users',
             'created_at' => date_create(), 'updated_at' => date_create()]);
        Role::create([ 'name' => 'employee', 'display_name' => 'Staff Member', 'description' => 'An employee who participates in activities or who can assign a volunteer to a victim ...',
             'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}

class PermissionsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('permissions')->delete();
        Permission::create([ 'name' => 'user-create', 'display_name' => 'Create Users', 'description' => 'User with this permissions is allowed to add edit and delete other users',
          'created_at' => date_create(), 'updated_at' => date_create()]);
       	
		Permission::create([ 'name' => 'user-read', 'display_name' => 'Display User', 'description' => 'User is allowed to display user listing',
           'created_at' => date_create(), 'updated_at' => date_create()]);
 
	
		Permission::create([ 'name' => 'user-edit', 'display_name' => 'Edit User', 'description' => 'User is allowed to edit user',
            'created_at' => date_create(), 'updated_at' => date_create()]);
 
		Permission::create([ 'name' => 'user-delete', 'display_name' => 'Delete User', 'description' => 'User is allowed to delete user',
           'created_at' => date_create(), 'updated_at' => date_create()]);
	
	
		Permission::create([ 'name' => 'role-create', 'display_name' => 'Create', 'description' => 'User is allowed to add roles',
             'created_at' => date_create(), 'updated_at' => date_create()]);
	
	
		Permission::create([ 'name' => 'role-read', 'display_name' => 'Display Role', 'description' => 'User is allowed to display a role',
             'created_at' => date_create(), 'updated_at' => date_create()]);

	
		Permission::create([ 'name' => 'role-edit', 'display_name' => 'Edit Role', 'description' => 'User is allowed to edit a role',
             'created_at' => date_create(), 'updated_at' => date_create()]);

		Permission::create([ 'name' => 'role-delete', 'display_name' => 'Delete Role', 'description' => 'User is allowed to delete a role',
            'created_at' => date_create(), 'updated_at' => date_create()]);

			
		Permission::create([ 'name' => 'cancer_type-read', 'display_name' => 'Display a cancer type', 'description' => 'User is allowed to display a cancer type',
            'created_at' => date_create(), 'updated_at' => date_create()]);

		Permission::create([ 'name' => 'cancer_type-create', 'display_name' => 'Display a cancer type', 'description' => 'User is allowed to display a cancer type',
            'created_at' => date_create(), 'updated_at' => date_create()]);

		Permission::create([ 'name' => 'cancer_type-edit', 'display_name' => 'Edit a cancer type', 'description' => 'User is allowed to edit a cancer type',
             'created_at' => date_create(), 'updated_at' => date_create()]);

		Permission::create([ 'name' => 'cancer_type-delete', 'display_name' => 'Delete a cancer type', 'description' => 'User is allowed to delete a cancer type',
             'created_at' => date_create(), 'updated_at' => date_create()]);

		//location
		Permission::create([ 'name' => 'location-read', 'display_name' => 'Display a location', 'description' => 'User is allowed to display a location',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'location-create', 'display_name' => 'Create a location', 'description' => 'User is allowed to create a location',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'location-edit', 'display_name' => 'Edit a location', 'description' => 'User is allowed to edit a location',
            'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'location-delete', 'display_name' => 'Delete a location', 'description' => 'User is allowed to delete a location',
            'created_at' => date_create(), 'updated_at' => date_create()]);

		//activity type
		Permission::create([ 'name' => 'activity_type-read', 'display_name' => 'Display an activity type', 'description' => 'User is allowed to display an activity type',
            'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'activity_type-create', 'display_name' => 'Create an activity type', 'description' => 'User is allowed to create an activity type',
            'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'activity_type-edit', 'display_name' => 'Edit an activity type', 'description' => 'User is allowed to edit an activity type',
            'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'activity_type-delete', 'display_name' => 'Delete an activity type', 'description' => 'User is allowed to delete an activity type',
             'created_at' => date_create(), 'updated_at' => date_create()]);

    

		//employee
		Permission::create([ 'name' => 'employee-read', 'display_name' => 'Display an employee', 'description' => 'User is allowed to display an employee record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'employee-create', 'display_name' => 'Create an Employee', 'description' => 'User is allowed to create an employee record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'employee-edit', 'display_name' => 'Edit an Employee', 'description' => 'User is allowed to edit an employee record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'employee-delete', 'display_name' => 'Delete an employee', 'description' => 'User is allowed to delete an employee record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
   }
}

class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();

        $user = User::where('name', '=', 'Chandapiwa Mpuchane')->first()->id;
        $role = Role::where('name', '=', 'admin')->first()->id;
        $role_user = [ ['role_id' => $role, 'user_id' => $user] ];
        DB::table('role_user')->insert($role_user);

    }
}

class UsersRolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUsers = Permission::where('name', '=', 'user-create')->first();
		$showUsers = Permission::where('name', '=', 'user-read')->first();
        $createRoles = Permission::where('name', '=', 'role-create')->first();
        $editRoles = Permission::where('name', '=', 'role-edit')->first();
		$showRoles = Permission::where('name', '=', 'role-read')->first();
		
        $adminRole = Role::where('name', '=', 'admin')->first();
        $adminRole->attachPermissions(array($createUsers, $showUsers, $createRoles, $editRoles, $showRoles));
						
    }
}

