<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatogeryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name_ar' => 'ملابس',
            'name_en' => 'Clothing',
            'image' => 'imagesfp/category/q.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Category::create([
            'name_ar' => 'أحذية',
            'name_en' => 'Shoes',
            'image' => 'imagesfp/category/w.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Category::create([
            'name_ar' => 'إكسسوارات',
            'name_en' => 'Accessories',
            'image' => 'imagesfp/category/e.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Category::create([
            'name_ar' => 'إلكترونيات',
            'name_en' => 'Electronics',
            'image' => 'imagesfp/category/r.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Category::create([
            'name_ar' => 'أثاث',
            'name_en' => 'Furniture',
            'image' => 'imagesfp/category/t.jpg',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}