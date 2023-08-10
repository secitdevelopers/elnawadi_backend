<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;

use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductSizeColor;
use App\Models\Size;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {

        Product::create([
            'name_en' => 'Classic White T-Shirt',
            'name_ar' => 'قميص أبيض كلاسيكي',
            'description_en' => 'A comfortable and stylish white t-shirt made from premium cotton.',
            'description_ar' => 'قميص أبيض مريح وأنيق مصنوع من القطن الفاخر.',
            'image' => 'imagesfp/product/a.jpg',
            'arrange' => 1,
            'quantity' => 100,
            'price' => 25.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'weight' => 1,
            // 'shipping_fee' => 5.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'TS001',
            'category_id' => 1,
            'user_id' => 1,
        ]);

        // Product 2
        Product::create([
            'name_en' => 'Leather Crossbody Bag',
            'name_ar' => 'حقيبة جلدية عبر الجسم',
            'description_en' => 'A stylish and practical leather crossbody bag for everyday use.',
            'description_ar' => 'حقيبة عبر الجسم من الجلد أنيقة وعملية للاستخدام اليومي.',
            'image' => 'imagesfp/product/s.jpg',
            'arrange' => 2,
            'quantity' => 50,
            'price' => 100.0,
            'status' => true,
            // 'discount' => 10.0,
            // 'shipping_fee' => 8.0,
            // 'discount_start' => '2023-07-25 00:00:00',
            // 'discount_end' => '2023-08-05 23:59:59',
            // 'offer' => 'Get 10% off on this item for a limited time!',
            // 'sku' => 'BG002',
            'category_id' => 2,
            'user_id' => 1,
            // 'weight' => 2,
        ]);

        // Product 3
        Product::create([
            'name_en' => 'Wireless Bluetooth Earbuds',
            'name_ar' => 'سماعات لاسلكية بلوتوث',
            'description_en' => 'High-quality wireless Bluetooth earbuds for an immersive audio experience.',
            'description_ar' => 'سماعات لاسلكية بلوتوث عالية الجودة لتجربة صوتية مدهشة.',
            'image' => 'imagesfp/product/d.jpg',
            'arrange' => 3,
            'quantity' => 75,
            'price' => 90.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 4.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'EB003',
            'category_id' => 3,
            'user_id' => 2,
            // 'weight' => 1,
        ]);

        // Product 4
        Product::create([
            'name_en' => 'Gaming Mechanical Keyboard',
            'name_ar' => 'لوحة مفاتيح ميكانيكية للألعاب',
            'description_en' => 'A high-performance gaming mechanical keyboard with RGB lighting.',
            'description_ar' => 'لوحة مفاتيح ميكانيكية للألعاب عالية الأداء مع إضاءة RGB.',
            'image' => 'imagesfp/product/f.jpg',
            'arrange' => 4,
            'quantity' => 30,
            'price' => 130.0,
            'status' => true,
            // 'discount' => 5.0,
            // 'shipping_fee' => 10.0,
            // 'discount_start' => '2023-07-20 00:00:00',
            // 'discount_end' => '2023-07-29 23:59:59',
            // 'offer' => 'Limited time offer: 5% discount on this gaming keyboard!',
            // 'sku' => 'KB004',
            'category_id' => 4,
            'user_id' => 2,
            // 'weight' => 3,
        ]);

        // Product 5
        Product::create([
            'name_en' => 'Handcrafted Ceramic Mug',
            'name_ar' => 'قدح سيراميك مصنوع يدويًا',
            'description_en' => 'A beautifully handcrafted ceramic mug, perfect for enjoying your favorite beverage.',
            'description_ar' => 'قدح سيراميك جميل مصنوع يدويًا، مثالي للاستمتاع بمشروبك المفضل.',
            'image' => 'imagesfp/product/g.jpg',
            'arrange' => 5,
            'quantity' => 20,
            'price' => 50.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 10.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'MG005',
            'category_id' => 5,
            'user_id' => 2,
            // 'weight' => 1,
        ]);








        Product::create([
            'name_en' => 'Handmade Leather Wallet',
            'name_ar' => 'محفظة جلدية مصنوعة يدويًا',
            'description_en' => 'This stylish handmade leather wallet features multiple card slots and a convenient coin pocket. It is perfect for carrying your essentials in style.',
            'description_ar' => 'تتميز هذه المحفظة الجلدية المصنوعة يدويًا بعدة فتحات للبطاقات وجيب مريح للنقود النقدية. إنها مثالية لحمل الضروريات الخاصة بك بأناقة.',
            'image' => 'imagesfp/product/k.jpg',
            'arrange' => 1,
            'quantity' => 20,
            'price' => 80.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 12.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'WL001',
            'category_id' => 1,
            'user_id' => 1,
            // 'weight' => 2,
        ]);

        Product::create([
            'name_en' => 'Handcrafted Wooden Coasters',
            'name_ar' => 'حامل أكواب خشبي مصنوع يدويًا',
            'description_en' => 'These beautiful wooden coasters are handmade and perfect for protecting your furniture from water rings and stains. They add a natural and rustic touch to any home.',
            'description_ar' => 'هذه الحوامل الخشبية الجميلة مصنوعة يدويًا ومثالية لحماية أثاث منزلك من حلقات الماء والبقع. إنها تضيف لمسة طبيعية وريفية إلى أي منزل.',
            'image' => 'imagesfp/product/l.jpg',
            'arrange' => 2,
            'quantity' => 12,
            'price' => 235.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 3.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'CO002',
            'category_id' => 2,
            'user_id' => 1,
            // 'weight' => 3,
        ]);

        Product::create([
            'name_en' => 'Handwoven Basket',
            'name_ar' => 'سلة مصنوعة يدويًا',
            'description_en' => 'This beautiful handwoven basket is perfect for storing towels, blankets, or other items. It is a unique and stylish addition to any home décor.',
            'description_ar' => 'هذه السلة الجميلة المصنوعة يدويًا مثالية لتخزين المناشف والبطانيات وغيرها من الأشياء. إنها إضافة فريدة وأنيقة لأي ديكور منزلي.',
            'image' => 'imagesfp/product/o.jpg',
            'arrange' => 3,
            'quantity' => 8,
            'price' => 60.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 7.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'BS003',
            'category_id' => 3,
            'user_id' => 1,
            // 'weight' => 2,
        ]);


        Product::create([
            'name_en' => 'Handmade Ceramic Lamp',
            'name_ar' => 'مصباح سيراميكي مصنوع يدويًا',
            'description_en' => 'This beautiful ceramic lamp is handmade and perfect for adding a warm glow to any room. It is a unique and stylish addition to your home décor.',
            'description_ar' => 'هذا المصباح السيراميكي الجميل مصنوع يدويًا ومثالي لإضفاء إضاءة دافئة على أي غرفة. إنه إضافة فريدة وأنيقة لديكور منزلك.',
            'image' => 'imagesfp/product/h.jpg',
            'arrange' => 5,
            'quantity' => 5,
            'price' => 150.0,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 9.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'LP005',
            'category_id' => 5,
            'user_id' => 1,
            // 'weight' => 2,
        ]);


        Product::create([
            'name_en' => 'Handmade Soap Bars',
            'name_ar' => 'أصناف الصابون المصنوعة',
            'description_en' => "These handmade soap bars are made with natural ingredients and come in a variety of scents. They are gentle on the skin and perfect for everyday use",
            'description_ar' => 'تتميز أصناف الصابون المصنوعة يدويًا هذه بتركيبتها الطبيعية وتأتي بعدة روائح. إنها لطيفة على البشرة ومثالية للاستخدام اليومي.',
            'image' => 'imagesfp/product/s.jpg',
            'arrange' => 4,
            'quantity' => 30,
            'price' => 7,
            'status' => true,
            // 'discount' => 0.0,
            // 'shipping_fee' => 2.0,
            // 'discount_start' => null,
            // 'discount_end' => null,
            // 'offer' => null,
            // 'sku' => 'SP004',
            'category_id' => 4,
            'user_id' => 1,
            // 'weight' => 1,
        ]);
    }
}