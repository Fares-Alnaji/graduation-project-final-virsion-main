<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Category', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Categories', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Category', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Category', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Product', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Products', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Product', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Product', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Slider', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Sliders', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Slider', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Slider', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-coupon', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-coupons', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-coupon', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-coupon', 'guard_name' => 'admin']);

        Permission::create(['name' => 'Create-Blog', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Read-Blogs', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Update-Blog', 'guard_name' => 'admin']);
        Permission::create(['name' => 'Delete-Blog', 'guard_name' => 'admin']);
    }
}
