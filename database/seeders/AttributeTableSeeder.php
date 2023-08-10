<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Attribute::create([
            'sku' => 'TS001-BLACK-S',
            'image' => 'black_tshirt_small.jpg',
            'price' => 25.0,
            'quantity' => 50,
            'product_id' => 1,
            'color_id' => 1,
            'size_id' => 1,
        ]);

        // Attribute 2 (Belongs to Product 1)
        Attribute::create([
            'sku' => 'TS001-WHITE-M',
            'image' => 'white_tshirt_medium.jpg',
            'price' => 25.0,
            'quantity' => 30,
            'product_id' => 1,
            'color_id' => null,
            'size_id' => 2,
        ]);

        // Attribute 3 (Belongs to Product 2)
        Attribute::create([
            'sku' => 'BG002-BROWN',
            'image' => 'brown_crossbody_bag.jpg',
            'price' => 89.0,
            'quantity' => 20,
            'product_id' => 1,
            'color_id' => null,
            'size_id' => 3, // Assuming this bag doesn't have a specific size
        ]);

        // Attribute 4 (Belongs to Product 3)
        Attribute::create([
            'sku' => 'EB003-BLACK',
            'image' => 'black_wireless_earbuds.jpg',
            'price' => 49.0,
            'quantity' => 100,
            'product_id' => 1,
            'color_id' => 1,
            'size_id' => null, // Assuming these earbuds don't have a specific size
        ]);

        // Attribute 5 (Belongs to Product 4)
        Attribute::create([
            'sku' => 'KB004-RGB',
            'image' => 'rgb_gaming_keyboard.jpg',
            'price' => 129.0,
            'quantity' => 10,
            'product_id' => 1,
            'color_id' => 4,
            'size_id' => null, // Assuming this keyboard doesn't have a specific size
        ]);




    Attribute::create([
            'sku' => 'KB004-RGB',
            'image' => 'rgb_gaming_keyboard.jpg',
            'price' => 129.0,
            'quantity' => 10,
            'product_id' => 2,
            'color_id' => 4,
            'size_id' => null, // Assuming this keyboard doesn't have a specific size
        ]);


        Attribute::create([
            'sku' => 'BG002-BROWN',
            'image' => 'brown_crossbody_bag.jpg',
            'price' => 89.0,
            'quantity' => 20,
            'product_id' => 3,
            'color_id' => null,
            'size_id' => 3, // Assuming this bag doesn't have a specific size
        ]);
       Attribute::create([
            'sku' => 'TS001-BLACK-S',
            'image' => 'black_tshirt_small.jpg',
            'price' => 25.0,
            'quantity' => 50,
            'product_id' => 4,
            'color_id' => 1,
            'size_id' => 1,
        ]);

    }
}