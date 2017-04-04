<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Permission;

class ActivitydetailPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


//activity
        Permission::create([ 'name' => 'activitydetail-read', 'display_name' => 'Display an activity detail', 'description' => 'User is allowed to display an activity detail',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activitydetail-create', 'display_name' => 'Create an activity detail', 'description' => 'User is allowed to create an activity detail',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activitydetail-edit', 'display_name' => 'Edit an activity detail', 'description' => 'User is allowed to edit an activity detail',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        
        Permission::create([ 'name' => 'activitydetail-delete', 'display_name' => 'Delete an activity detail', 'description' => 'User is allowed to delete an activity detail',
             'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}
