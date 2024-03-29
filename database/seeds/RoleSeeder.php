<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'doctor']);
        Role::create(['name' => 'nurse']);
        Role::create(['name' => 'pharmacist']);
        Role::create(['name' => 'patient']);
    }
}
