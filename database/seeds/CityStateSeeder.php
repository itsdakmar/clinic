<?php

use App\City;
use App\State;
use Illuminate\Database\Seeder;

class CityStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file_get_contents(public_path('all.json'));
        $json = json_decode($file, true);

        foreach ($json as $key => $state){
            foreach ($state as $negeri){
                $state = State::create(['name' => $negeri['name']]);
                foreach ($negeri['city'] as $city){
                    City::create(['name' => $city['name'], 'stateId' => $state->id]);
                }
            }

        }
    }
}
