<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'variant_create',
            ],
            [
                'id'    => 19,
                'title' => 'variant_edit',
            ],
            [
                'id'    => 20,
                'title' => 'variant_show',
            ],
            [
                'id'    => 21,
                'title' => 'variant_delete',
            ],
            [
                'id'    => 22,
                'title' => 'variant_access',
            ],
            [
                'id'    => 23,
                'title' => 'product_create',
            ],
            [
                'id'    => 24,
                'title' => 'product_edit',
            ],
            [
                'id'    => 25,
                'title' => 'product_show',
            ],
            [
                'id'    => 26,
                'title' => 'product_delete',
            ],
            [
                'id'    => 27,
                'title' => 'product_access',
            ],
            [
                'id'    => 28,
                'title' => 'category_create',
            ],
            [
                'id'    => 29,
                'title' => 'category_edit',
            ],
            [
                'id'    => 30,
                'title' => 'category_show',
            ],
            [
                'id'    => 31,
                'title' => 'category_delete',
            ],
            [
                'id'    => 32,
                'title' => 'category_access',
            ],
            [
                'id'    => 33,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
