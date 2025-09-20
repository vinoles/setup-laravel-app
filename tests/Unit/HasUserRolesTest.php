<?php

namespace Tests\Unit;

use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Tests\TestCase;

class HasUserRolesTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        // Create roles and permissions
        $this->createRoles();
    }

    /**
     * Test isAdmin() function
     */
    public function test_is_admin_function(): void
    {
        // Test user without admin role
        $this->assertFalse($this->user->isAdmin());

        // Assign admin role
        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertTrue($this->user->isAdmin());

        // Test with super admin role (should not be admin)
        $this->user->removeRole(UserRole::ADMIN->value);
        $this->user->assignRole(UserRole::SUPER_ADMIN->value);
        $this->assertFalse($this->user->isAdmin());
    }

    /**
     * Test isSuperAdmin() function
     */
    public function test_is_super_admin_function(): void
    {
        // Test user without super admin role
        $this->assertFalse($this->user->isSuperAdmin());

        // Assign super admin role
        $this->user->assignRole(UserRole::SUPER_ADMIN->value);
        $this->assertTrue($this->user->isSuperAdmin());

        // Test with admin role (should not be super admin)
        $this->user->removeRole(UserRole::SUPER_ADMIN->value);
        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertFalse($this->user->isSuperAdmin());
    }

    /**
     * Test isTalent() function
     */
    public function test_is_talent_function(): void
    {
        // Test user without talent role
        $this->assertFalse($this->user->isTalent());

        // Assign talent role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->isTalent());

        // Test with other roles
        $this->user->removeRole(UserRole::TALENT->value);
        $this->user->assignRole(UserRole::SCOUT->value);
        $this->assertFalse($this->user->isTalent());
    }

    /**
     * Test isScout() function
     */
    public function test_is_scout_function(): void
    {
        // Test user without scout role
        $this->assertFalse($this->user->isScout());

        // Assign scout role
        $this->user->assignRole(UserRole::SCOUT->value);
        $this->assertTrue($this->user->isScout());

        // Test with other roles
        $this->user->removeRole(UserRole::SCOUT->value);
        $this->user->assignRole(UserRole::CLUB->value);
        $this->assertFalse($this->user->isScout());
    }

    /**
     * Test isClub() function
     */
    public function test_is_club_function(): void
    {
        // Test user without club role
        $this->assertFalse($this->user->isClub());

        // Assign club role
        $this->user->assignRole(UserRole::CLUB->value);
        $this->assertTrue($this->user->isClub());

        // Test with other roles
        $this->user->removeRole(UserRole::CLUB->value);
        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertFalse($this->user->isClub());
    }

    /**
     * Test isAnyAdmin() function
     */
    public function test_is_any_admin_function(): void
    {
        // Test user without any admin role
        $this->assertFalse($this->user->isAnyAdmin());

        // Test with admin role
        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertTrue($this->user->isAnyAdmin());

        // Test with super admin role
        $this->user->removeRole(UserRole::ADMIN->value);
        $this->user->assignRole(UserRole::SUPER_ADMIN->value);
        $this->assertTrue($this->user->isAnyAdmin());

        // Test with non-admin role
        $this->user->removeRole(UserRole::SUPER_ADMIN->value);
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertFalse($this->user->isAnyAdmin());
    }

    /**
     * Test hasAnyOfRoles() function
     */
    public function test_has_any_of_roles_function(): void
    {
        // Test user without any roles
        $this->assertFalse($this->user->hasAnyOfRoles([UserRole::TALENT->value, UserRole::SCOUT->value]));

        // Test with one of the specified roles
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->hasAnyOfRoles([UserRole::TALENT->value, UserRole::SCOUT->value]));

        // Test with different role
        $this->user->removeRole(UserRole::TALENT->value);
        $this->user->assignRole(UserRole::SCOUT->value);
        $this->assertTrue($this->user->hasAnyOfRoles([UserRole::TALENT->value, UserRole::SCOUT->value]));

        // Test with role not in the list
        $this->user->removeRole(UserRole::SCOUT->value);
        $this->user->assignRole(UserRole::CLUB->value);
        $this->assertFalse($this->user->hasAnyOfRoles([UserRole::TALENT->value, UserRole::SCOUT->value]));

        // Test with single role as string
        $this->user->removeRole(UserRole::CLUB->value);
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->hasAnyOfRoles(UserRole::TALENT->value));
    }

    /**
     * Test getPrimaryRole() function
     */
    public function test_get_primary_role_function(): void
    {
        // Test user without roles
        $this->assertNull($this->user->getPrimaryRole());

        // Test with single role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertEquals(UserRole::TALENT->value, $this->user->getPrimaryRole());

        // Test priority order with multiple roles
        $this->user->assignRole(UserRole::SCOUT->value);
        $this->assertEquals(UserRole::SCOUT->value, $this->user->getPrimaryRole()); // Scout has higher priority than talent

        $this->user->assignRole(UserRole::CLUB->value);
        $this->assertEquals(UserRole::CLUB->value, $this->user->getPrimaryRole()); // Club has higher priority than scout

        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertEquals(UserRole::ADMIN->value, $this->user->getPrimaryRole()); // Admin has higher priority than club

        $this->user->assignRole(UserRole::SUPER_ADMIN->value);
        $this->assertEquals(UserRole::SUPER_ADMIN->value, $this->user->getPrimaryRole()); // Super admin has highest priority
    }

    /**
     * Test multiple roles scenario
     */
    public function test_multiple_roles_scenario(): void
    {
        // Assign multiple roles
        $this->user->assignRole(UserRole::TALENT->value);
        $this->user->assignRole(UserRole::SCOUT->value);

        // Test individual role functions
        $this->assertTrue($this->user->isTalent());
        $this->assertTrue($this->user->isScout());
        $this->assertFalse($this->user->isClub());
        $this->assertFalse($this->user->isAdmin());
        $this->assertFalse($this->user->isSuperAdmin());

        // Test isAnyAdmin with non-admin roles
        $this->assertFalse($this->user->isAnyAdmin());

        // Test hasAnyOfRoles
        $this->assertTrue($this->user->hasAnyOfRoles([UserRole::TALENT->value, UserRole::CLUB->value]));
        $this->assertTrue($this->user->hasAnyOfRoles([UserRole::SCOUT->value, UserRole::ADMIN->value]));

        // Test getPrimaryRole (should return scout as it has higher priority)
        $this->assertEquals(UserRole::SCOUT->value, $this->user->getPrimaryRole());
    }

    /**
     * Test edge cases
     */
    public function test_edge_cases(): void
    {
        // Test hasAnyOfRoles with empty array
        $this->assertFalse($this->user->hasAnyOfRoles([]));

        // Test hasAnyOfRoles with non-existent role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertFalse($this->user->hasAnyOfRoles(['non_existent_role']));

        // Test getPrimaryRole with user having no roles after role removal
        $this->user->removeRole(UserRole::TALENT->value);
        $this->assertNull($this->user->getPrimaryRole());
    }

    /**
     * Test role verification after role changes
     */
    public function test_role_verification_after_changes(): void
    {
        // Start with talent role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->isTalent());
        $this->assertFalse($this->user->isAdmin());

        // Change to admin role
        $this->user->removeRole(UserRole::TALENT->value);
        $this->user->assignRole(UserRole::ADMIN->value);
        $this->assertFalse($this->user->isTalent());
        $this->assertTrue($this->user->isAdmin());
        $this->assertTrue($this->user->isAnyAdmin());

        // Add super admin role (now has both admin and super admin)
        $this->user->assignRole(UserRole::SUPER_ADMIN->value);
        $this->assertTrue($this->user->isAdmin());
        $this->assertTrue($this->user->isSuperAdmin());
        $this->assertTrue($this->user->isAnyAdmin());
        $this->assertEquals(UserRole::SUPER_ADMIN->value, $this->user->getPrimaryRole());
    }

    /**
     * Create roles and permissions for testing
     */
    private function createRoles(): void
    {
        // Create all permissions using the enum
        $allPermissions = \App\Constants\Permission::getAllPermissions();
        foreach ($allPermissions as $permission) {
            SpatiePermission::create(['name' => $permission]);
        }

        // Get permissions grouped by role from the enum
        $permissionsByRole = \App\Constants\Permission::getPermissionsByRole();

        // Create roles and assign permissions
        foreach ($permissionsByRole as $roleName => $permissions) {
            $role = Role::create(['name' => $roleName]);
            $role->givePermissionTo($permissions);
        }

        // Create super_admin role with all permissions
        $userRole = Role::create(['name' => UserRole::SUPER_ADMIN->value]);
        $userRole->givePermissionTo(SpatiePermission::all());
    }
}
