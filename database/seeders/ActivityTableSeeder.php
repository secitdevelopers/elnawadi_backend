<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            [
                'name_en' => 'English Activity 1',
                'name_ar' => 'نشاط كرة قدم',
                'arrange' => 1,
                'price' => 100.00,
                // 'price_for_one' => 50.00,
                // 'price_for_two' => 80.00,
                // 'price_for_three' => 80.00,
                'status' => true,
            
                'adress' => 'adress 1',
                'description_en' => 'Description for Activity 1 in English.',
                'description_ar' => 'Description for Activity 1 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(7),
                'user_id' => 1,
                'image' => "imagesfp/activity/f1.jpg",
                'activities_catogeries_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'English Activity 2',
                'name_ar' => 'تماريين كرة القدم',
                'arrange' => 2,
                'price' => 110.00,
                // 'price_for_one' => 55.00,
                // 'price_for_two' => 90.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 2',
                'description_en' => 'Description for Activity 2 in English.',
                'description_ar' => 'Description for Activity 2 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(10),
                'user_id' => 1,
                'image' => "imagesfp/activity/f2.jpg",
                'activities_catogeries_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تدريب سرعه',
                'arrange' => 3,
                'price' => 120.00,
                // 'price_for_one' => 60.00,
                // 'price_for_two' => 100.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/f3.jpg",
                'activities_catogeries_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تدريب سرعه',
                'arrange' => 3,
                'price' => 120.00,
                // 'price_for_one' => 60.00,
                // 'price_for_two' => 100.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/b1.jpg",
                'activities_catogeries_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تدريب جري',
                'arrange' => 3,
                'price' => 150.00,
                // 'price_for_one' => 120.00,
                // 'price_for_two' => 150.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/b2.jpg",
                'activities_catogeries_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تدريب سرعه',
                'arrange' => 3,
                'price' => 200.00,
                // 'price_for_one' => 20.00,
                // 'price_for_two' => 500.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/t1.jpg",
                'activities_catogeries_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],




            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تحدي الجري',
                'arrange' => 3,
                'price' => 220.00,
                // 'price_for_one' => 300.00,
                // 'price_for_two' => 400.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/t2.jpg",
                'activities_catogeries_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],






            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'تحدي الالف ميل',
                'arrange' => 3,
                'price' => 290.00,
                // 'price_for_one' => 220.00,
                // 'price_for_two' => 100.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/t3.jpg",
                'activities_catogeries_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],




            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'سباق لكرة الطائره',
                'arrange' => 3,
                'price' => 290.00,
                // 'price_for_one' => 220.00,
                // 'price_for_two' => 200.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/b3.jpg",
                'activities_catogeries_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],






            [
                'name_en' => 'English Activity 3',
                'name_ar' => 'التحدي الثاني عشر',
                'arrange' => 3,
                'price' => 200.00,
                // 'price_for_one' => 20.00,
                // 'price_for_two' => 500.00,
                // 'price_for_three' => 80.00,
                'status' => true,

                'adress' => 'adress 3',
                'description_en' => 'Description for Activity 3 in English.',
                'description_ar' => 'Description for Activity 3 in Arabic.',
                'start_data' => now(),
                'end_data' => now()->addDays(14),
                'user_id' => 1,
                'image' => "imagesfp/activity/u1.jpg",
                'activities_catogeries_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}