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
            'active' => true
        ]);

        $admin->assignRole('administrator');

        $doctor = User::create([
            'matricStaffId' => 'B031710277',
            'firstName' => 'Athira',
            'lastName' => 'Abd',
            'email' => 'athira@gmail.com',
            'password' => Hash::make('secret'),
            'active' => true

        ]);

        $doctor->assignRole('doctor');

        $nurse = User::create([
            'matricStaffId' => '000001',
            'firstName' => 'Sofia',
            'lastName' => 'Melissa',
            'email' => 'sofia@gmail.com',
            'password' => Hash::make('secret'),
            'active' => true

        ]);

        $nurse->assignRole('nurse');

        $nurse = User::create([
            'matricStaffId' => '000003',
            'firstName' => 'Ahmad ',
            'lastName' => 'Lim',
            'email' => 'ahmadlim@gmail.com',
            'password' => Hash::make('secret'),
            'active' => true

        ]);

        $nurse->assignRole('pharmacist');

        $patient = User::create([
            'matricStaffId' => '000002',
            'firstName' => 'Siti',
            'lastName' => 'Aafiyah',
            'email' => 'aafiyah@gmail.com',
            'password' => Hash::make('secret'),
            'is_student' => 1,
            'active' => true

        ]);

        $patient->patientDetail()->create([
            'sex' => 'F',
            'race' => 'M',
            'dob' => '1992-04-13',
            'weight' => 53,
            'height' => 159,
            'bloodGroup' => 'o+',
            'phone' => '0126364566',
            'address_1' => 'NO 21 LORONG 1 JLN SW 14',
            'address_2' => 'TAMAN SUTERA WANGI',
            'cityId' => 123,
            'stateId' => 5,
            'postcode' => '75350'
        ]);

        $patient->assignRole('patient');
    }
}
