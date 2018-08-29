<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class TestAdminSeeder extends Seeder
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

        User::insert([
            [
                'fname' => 'Admin',
                'lname' => 'Test',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
            ]
        ]);

        DB::table('role_user')->insert(
            [
                'role_id' => 1, 
                'user_id' => 1, 
                'user_type' => 'App\Models\User'
            ]
        );

    }
}
