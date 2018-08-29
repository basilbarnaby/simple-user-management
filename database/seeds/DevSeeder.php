<?php

use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ResetLaratrustTablesSeeder::class);
        $this->call(TestAdminSeeder::class);
    }
}
