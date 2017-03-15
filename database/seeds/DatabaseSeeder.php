<?php

use Illuminate\Database\Seeder;
/*use database\seeds\UsersRolesPermissions;*/
/*use App\Tag;*/

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the System Users/Roles/Permissions tables
		/*
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
		$this->call(UsersRolesPermissions::class);
        $this->call(RoleUserTableSeeder::class);
        //$this->call(UserRolePermissionsTableSeeder::class);
		*/
		
		$this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(UsersRolesPermissionsTableSeeder::class);
        $this->command->info('User, Role and Permission tables seeded!');

        // Seed the Tags table
        /*
		$this->call(TagsTableSeeder::class);
        $this->command->info('Tags tables seeded!');
		*/
    }
}

		


