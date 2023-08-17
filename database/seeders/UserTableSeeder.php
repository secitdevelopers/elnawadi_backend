<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $userData = [
            [
                'name' => 'taha',
                'type' => 'admin',
                'status' => 1,

                'phone' => '011111111111',
                'email' => 'tth31770@gmail.com',
                'created_at' => now(),
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mohamed',
                'type' => 'vendor',
                'status' => 1,
                'phone' => '011111111111',
                'email' => 'vendor@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ahmed',
                'type' => 'supervisor',
                'status' => 1,
                'phone' => '011111111111',
                'email_verified_at' => now(),
                'email' => 'supervisor@gmail.com',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'ahmed Ragaa',
                'type' => 'user',
                'status' => 1,
                'phone' => '011111111111',
                'email_verified_at' => now(),
                'email' => 'ahmedragaa07@gmail.com',
                'password' => bcrypt('Ahmed12345'),
                'created_at' => now(),
                'updated_at' => now(),
            ],


            [
                'name' => 'yousef',
                'type' => 'user',
                'status' => 1,
                'phone' => '011111111111',
                'email' => 'user2@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'magedy',
                'type' => 'user',
                'status' => 1,
                'phone' => '011111111111',
                'email' => 'user3@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        $userPermission = [
            'admin',
            'vendor',
            'supervisor',
            'user',

        ];
        $PermissionAdmin = [
            'عام',
            'تسوق',
            'معلومات الانشطه',
            'الاعدادت العامه',
            'الطلبيات',
            'الرئيسيه',




            'لوحة القياده',
            'لوحة القياده للبائع',



            'الانشطه',
            'جميع الانشطه',
            'الانشطه الغير مفعله',
            'اضافة نشاط',
            'تعديل نشاط',
            'حذف نشاط',
            'حالة نشاط',




            'التصنيفات',
            'جميع التصنيفات',
            'اضافة تصنيف',
            'تعديل تصنيف',
            'حذف تصنيف',


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

            'ادارة المستخدم',
            'المشرفون',
            'الصلاحيات',
            'العملاء',
            'مزودي الخدمه',

            'البنرات الاعلانيه',
            'الاداره الماليه',
            'ادارة الاشتراكات',
            'التقارير و الاستعلامات',
            'الاعدادات',
            'اعدادت الصفحات',
            'اعدادت مزودي الخدمه',

            'المتتجات الخاصه',

        ];

        $PermissionVendor = [
            'الرئيسيه',
            'لوحة القياده للبائع',
            'الاعدادت العامه',
            'الانشطه',
            'اعدادت مزودي الخدمه',

            'جميع الانشطه',
            'الانشطه الغير مفعله',
            'اضافة نشاط',
            'تعديل نشاط',
            'حذف نشاط',
            'حالة نشاط',
        ];
        $PermissionSupervisor = [  
            'الرئيسيه',     
            'لوحة القياده',

        ];

        $roleList = [];
        foreach ($userPermission as $permissionName)
        {
            $role = Role::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);

            if ($role->name == 'admin')
            {
                $role->syncPermissions($PermissionAdmin);
            }
            else if ($role->name == 'vendor')
            {
                $role->syncPermissions($PermissionVendor);
            }
            else
            {
                $role->syncPermissions($PermissionSupervisor);
            }

            $roleList[] = $role->id;
        }

        foreach ($userData as $data)
        {
            $user = User::create($data);
            if ($user->id == 1)
            {
                $user->assignRole([$roleList[0]]);
            }
            elseif ($user->id == 2)
            {
                $user->assignRole([$roleList[1]]);
            }
            elseif ($user->id == 3)
            {
                $user->assignRole([$roleList[2]]);
            }
            else
            {
                $user->assignRole([$roleList[3]]);
            }
        }
    }
}