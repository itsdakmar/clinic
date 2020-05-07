<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'matricStaffId' => 'B031810044',
            'firstName' => 'Ammar',
            'lastName' => 'Razaman',
            'email' => 'amar@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $admin->assignRole('administrator');

        $doctor = User::create([
            'matricStaffId' => 'B031710277',
            'firstName' => 'Athira',
            'lastName' => 'Abd',
            'email' => 'athira@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $doctor->assignRole('doctor');

        $nurse = User::create([
            'matricStaffId' => '000001',
            'firstName' => 'Sofia',
            'lastName' => 'Melissa',
            'email' => 'sofia@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $nurse->assignRole('nurse');

        $patient = User::create([
            'matricStaffId' => '000002',
            'firstName' => 'Siti',
            'lastName' => 'Aafiyah',
            'email' => 'aafiyah@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $patient->assignRole('patient');
    }
}
