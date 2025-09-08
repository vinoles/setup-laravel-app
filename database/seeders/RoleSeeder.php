<?php

namespace Database\Seeders;

use App\Constants\Permission;
use App\Constants\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create all unique permissions using the enum
        $allPermissions = Permission::getAllPermissions();
        foreach ($allPermissions as $permission) {
            SpatiePermission::firstOrCreate(['name' => $permission]);
        }

        // Get permissions grouped by role from the enum
        $permissionsByRole = Permission::getPermissionsByRole();

        // Create roles and assign permissions
        foreach ($permissionsByRole as $roleName => $permissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($permissions);
        }

        // Create super_admin role with all permissions
        $superAdminRole = Role::firstOrCreate(['name' => UserRole::SUPER_ADMIN->value]);
        $superAdminRole->syncPermissions(SpatiePermission::all()->pluck('name')->toArray());
    }
}
