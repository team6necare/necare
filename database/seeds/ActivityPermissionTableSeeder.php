<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Permission;

class ActivityPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//activity
        Permission::create([ 'name' => 'activity-read', 'display_name' => 'Display an activity', 'description' => 'User is allowed to display an activity',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activity-create', 'display_name' => 'Create an activity', 'description' => 'User is allowed to create an activity',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activity-edit', 'display_name' => 'Edit an activity', 'description' => 'User is allowed to edit an activity',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activity-delete', 'display_name' => 'Delete an activity', 'description' => 'User is allowed to delete an activity',
             'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}
