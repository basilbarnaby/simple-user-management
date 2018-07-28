<?php

use Illuminate\Database\Seeder;
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
        Permission::truncate();
    }
}
