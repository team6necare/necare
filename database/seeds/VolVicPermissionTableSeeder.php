<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Permission;

class VolVicPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		//volunteer
		Permission::create([ 'name' => 'volunteer-read', 'display_name' => 'Display a volunteer', 'description' => 'User is allowed to display a volunteer record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'volunteer-create', 'display_name' => 'Create a volunteer', 'description' => 'User is allowed to create a volunteer record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'volunteer-edit', 'display_name' => 'Edit a volunteer', 'description' => 'User is allowed to edit a volunteer record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'volunteer-delete', 'display_name' => 'Delete a volunteer', 'description' => 'User is allowed to delete a volunteer record',
             'created_at' => date_create(), 'updated_at' => date_create()]);

		//volunteer
		Permission::create([ 'name' => 'victim-read', 'display_name' => 'Display a victim', 'description' => 'User is allowed to display an volunteer record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'victim-create', 'display_name' => 'Create a victim', 'description' => 'User is allowed to create a victim record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'victim-edit', 'display_name' => 'Edit a victim', 'description' => 'User is allowed to edit a victim record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'victim-delete', 'display_name' => 'Delete a victim', 'description' => 'User is allowed to delete a victim record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
   }
}
