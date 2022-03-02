<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Admin;
        $data->name = 'Admin';
        $data->email = 'admin@gmail.com';
        $data->password = Hash::make('admin@123');

        $role = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $data->assignRole('super-admin');

        $data->save();
    }
}
