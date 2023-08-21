<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'company_name' => 'شركة الاصايل',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن شركة الاصايل',
                'logo' => 'imagesfp/setting/a.jpg',
                'background_image' => 'imagesfp/setting/a.jpg',
                'user_id' => '1',
                'isadmin' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

                        [
                'company_name' => 'رياضة لايف',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن رياضة لايف',
                'logo' => 'imagesfp/setting/a.jpg',
                'background_image' => 'imagesfp/setting/s.jpg',
                'user_id' => '2',
                'isadmin' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'company_name' => 'العزم الرياضي',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن العزم الرياضي',
                'logo' => 'imagesfp/setting/a.jpg',
                'background_image' => 'imagesfp/setting/d.jpg',
                'user_id' => '3',
                'isadmin' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'company_name' => 'الشمس الرياضية',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن الشمس الرياضية',
                'logo' => 'imagesfp/setting/f.jpg',
                'background_image' => 'imagesfp/setting/a.jpg',
                'user_id' => '4',
                'isadmin' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'company_name' => 'قوة الأبطال',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن قوة الأبطال',
                'logo' => 'imagesfp/setting/g.jpg',
                'background_image' => 'imagesfp/setting/a.jpg',
                'user_id' => '5',
                'isadmin' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
                        [
                'company_name' => 'الأداء الرياضي',
                'email' => 'company1@email.com',
                'website_link' => 'company1.com',
                'company_phone' => '1234567890',
                'company_address' => '123 Main St',
                'twitter' => 'https://twitter.com/company1',
                'facebook' => 'https://facebook.com/company1',
                'google' => 'https://plus.google.com/company1',
                'linkedin' => 'https://linkedin.com/company1',
                'github' => 'https://github.com/company1',
                'biographical_information' => 'عن الأداء الرياضي',
                'logo' => 'imagesfp/setting/a.jpg',
                'background_image' => 'imagesfp/setting/a.jpg',
                'user_id' => '6',
                'isadmin' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('settings')->insert($companies);

    }
}