<?php

use App\Drug;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drug::create([
            'name' => 'ACETYLSALICYLIC ACID 300MG',
            'description' => 'ACETYLSALICYLIC ACID 300MG',
            'quantity' => 120,
            'price' => 25.90,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'SCOBIC ACID 100MG',
            'description' => 'STORED IN REFRIGERATOR',
            'quantity' => 90,
            'price' => 15.90,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'BENZHEXOL 2MG',
            'description' => '',
            'quantity' => 100,
            'price' => 10,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'BISACODYL 5MG',
            'description' => '',
            'quantity' => 130,
            'price' => 7,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'CHLORPHENIRAMINE 4MG',
            'description' => '',
            'quantity' => 90,
            'price' => 7.50,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'CAPTOPRIL 25MG',
            'description' => '',
            'quantity' => 120,
            'price' => 15.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'DIPHENOXYLATE-ATROP(LOMOTIL)',
            'description' => '',
            'quantity' => 120,
            'price' => 10.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'FERROUS FUMARATE 200MG',
            'description' => '',
            'quantity' => 120,
            'price' => 23.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'FOLIC ASID 5MG',
            'description' => '',
            'quantity' => 100,
            'price' => 9.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'CLICOTIDE 80MG',
            'description' => '',
            'quantity' => 100,
            'price' => 9.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'GLYCERYL TRINITRATE O.5MG(GTN)',
            'description' => '',
            'quantity' => 100,
            'price' => 70.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'HYOSCINE N.BUTYL BR.10MG',
            'description' => '',
            'quantity' => 100,
            'price' => 19.30,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'PARACETEMOL 500MG',
            'description' => '',
            'quantity' => 300,
            'price' => 10.90,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'VITAMIN B-COMPLEX',
            'description' => '',
            'quantity' => 200,
            'price' => 12.90,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);

        Drug::create([
            'name' => 'TAB.MULTIVIATIM',
            'description' => '',
            'quantity' => 100,
            'price' => 13.90,
            'expired_date' => \Carbon\Carbon::now()->addYears(rand(1,10))
        ]);



    }
}
