<?php

namespace Database\Seeders;

use App\Models\ActivitiesCatogery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitiesCatogeryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivitiesCatogery::create([
            'name_ar' => 'نوادي كرة القدم',
            'name_en' => 'Football clubs',
            'image' => 'imagesfp/category/q.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ActivitiesCatogery::create([
            'name_ar' => 'نوادي كرة السله',
            'name_en' => 'Basketball clubs',
            'image' => 'imagesfp/category/w.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ActivitiesCatogery::create([
            'name_ar' => 'نوادي كرة التنس',
            'name_en' => 'tennis clubs',
            'image' => 'imagesfp/category/e.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ActivitiesCatogery::create([
            'name_ar' => 'نوادي كرة الطائره',
            'name_en' => 'Volleyball clubs',
            'image' => 'imagesfp/category/r.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        ActivitiesCatogery::create([
            'name_ar' => 'نوادي كرة الشارع',
            'name_en' => 'streetball clubs',
            'image' => 'imagesfp/category/t.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}