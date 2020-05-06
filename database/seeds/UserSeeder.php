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
            'name' => 'Ammar Razaman',
            'email' => 'amar@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $admin->assignRole('administrator');

        $doctor = User::create([
            'name' => 'Athira Abd',
            'email' => 'athira@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $doctor->assignRole('doctor');

        $nurse = User::create([
            'name' => 'Sofia Melissa',
            'email' => 'sofia@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $nurse->assignRole('nurse');

        $patient = User::create([
            'name' => 'Siti Aafiyah',
            'email' => 'aafiyah@gmail.com',
            'password' => Hash::make('secret'),
        ]);

        $patient->assignRole('patient');
    }
}
