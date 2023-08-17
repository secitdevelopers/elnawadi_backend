<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
             'عام',   'تسوق', 'معلومات الانشطه', 'الاعدادت العامه','الطلبيات','الرئيسيه',




            'الصفحه الرئيسيه',
            'الصفحه الرئيسيه للتاجر',

           

            'الانشطه',
            'جميع الانشطه',
            'الانشطه الغير مفعله',
            'اضافة نشاط',
            'تعديل نشاط',
            'حذف نشاط',
            'حالة نشاط',




            'الاقسام',   
            'جميع الاقسام',
            'اضافة قسم',
            'تعديل قسم',
            'حذف قسم',

            
            'المنتجات',
            'جميع المنتجات',
            'المنتجات الغير مفعله',
            'اضافة منتج',
            'تعديل منتج',
            'حذف منتج',
            'حالة منتج',
           
            'القسائم',
            'جميع القسائم',
            'اضافة قسيمه',
            'تعديل قسيمه',
            'حذف قسيمه',

            
            'جميع الطلبيات',
            'عرض الطلبيه',
            'حذف الطلبيه',
            'طباعة الطلبيه',

            'المستخدمين',
            'رؤية المستخدمين',
            'صلاحيات المستخدمين',
            'الدول و الضرائب',

            'التقارير و الاستعلامات',
            'الاعدادات',
            'اعدادت الصفحات',
            'الاعدادت الرئيسيه',
           
             'الصفحه الرئيسيه للبائع',
            'المتتجات الخاصه',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}