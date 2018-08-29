<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class ResetLaratrustTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Role::truncate();
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Role::insert([
            [
                'name' => 'superadmin',
                'display_name' => 'Super Administrator',
                'description' => 'All access granted'
            ],
            [
                'name' => 'administrator',
                'display_name' => 'Administrator',
                'description' => 'User with administrative privileges'
            ],
            [
                'name' => 'user',
                'display_name' => 'User',
                'description' => 'User with basic privileges'
            ],
        ]);
    }
}
