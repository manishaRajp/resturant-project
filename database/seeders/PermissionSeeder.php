<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission =
        [
            [
            'permission_module_name'=> 'Resturant-Editor',
            'name' => 'resturant-create',
            'guard_name' => 'admin',
            ],
            
            [
            'permission_module_name'=> 'Resturant-Editor',
            'name' => 'resturant-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Resturant-Editor',
            'name' => 'resturant-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Resturant-Editor',
            'name' => 'resturant-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Meal-Editor',
            'name' => 'meal-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Meal-Editor',
            'name' => 'meal-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Meal-Editor',
            'name' => 'meal-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Meal-Editor',
            'name' => 'meal-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'User-Editor',
            'name' => 'user-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'User-Editor',
            'name' => 'user-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'User-Editor',
            'name' => 'user-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'User-Editor',
            'name' => 'user-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Pay-Editor',
            'name' => 'payment-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Pay-Editor',
            'name' => 'payment-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Pay-Editor',
            'name' => 'payment-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Pay-Editor',
            'name' => 'payment-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Promocode-Editor',
            'name' => 'promocode-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Promocode-Editor',
            'name' => 'promocode-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Promocode-Editor',
            'name' => 'promocode-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Promocode-Editor',
            'name' => 'promocode-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'QR-Editor',
            'name' => 'qr code-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'QR-Editor',
            'name' => 'qr code-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'QR-Editor',
            'name' => 'qr code-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'QR-Editor',
            'name' => 'qr code-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Dasboard-Editor',
            'name' => 'dasboard-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Dasboard-Editor',
            'name' => 'dasboard-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Dasboard-Editor',
            'name' => 'dasboard-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Dasboard-Editor',
            'name' => 'dasboard-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Role-Editor',
            'name' => 'role-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Role-Editor',
            'name' => 'role-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Role-Editor',
            'name' => 'role-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Role-Editor',
            'name' => 'role-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Order-Editor',
            'name' => 'order-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Order-Editor',
            'name' => 'order-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Order-Editor',
            'name' => 'order-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Order-Editor',
            'name' => 'order-delete',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Admin-Editor',
            'name' => 'admin-create',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Admin-Editor',
            'name' => 'admin-edit',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Admin-Editor',
            'name' => 'admin-list',
            'guard_name' => 'admin',
            ],
            [
            'permission_module_name'=> 'Admin-Editor',
            'name' => 'admin-delete',
            'guard_name' => 'admin',
            ],
        ];
        Permission::insert($permission);
        
    }
}
