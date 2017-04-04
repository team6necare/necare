<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Permission;

class VolSchPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		//volunteerschedule
		Permission::create([ 'name' => 'vschedule-read', 'display_name' => 'Display a Volunteer-Schedule', 'description' => 'User is allowed to display a volunteer-schedule record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'vschedule-create', 'display_name' => 'Create a Volunteer-Schedule', 'description' => 'User is allowed to create a volunteer-schedule record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'vschedule-edit', 'display_name' => 'Edit a Volunteer-Schedule', 'description' => 'User is allowed to edit a volunteer-schedule record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
		
		Permission::create([ 'name' => 'vschedule-delete', 'display_name' => 'Delete a Volunteer-Schedule', 'description' => 'User is allowed to delete a volunteer-schedule record',
             'created_at' => date_create(), 'updated_at' => date_create()]);
   }
}
