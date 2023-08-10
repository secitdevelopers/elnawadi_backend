<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Country::create([
                'name' => 'الامارات',
                'country_tax'=>20,
            ]);

             Country::create([
                'name' => 'السعوديه',
                'country_tax'=>10,
            ]);
            
           Country::create([
                'name' => 'مصر',
                'country_tax'=>35,
            ]);       
            

       
    }
}