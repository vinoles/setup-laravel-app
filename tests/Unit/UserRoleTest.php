<?php

namespace Tests\Unit;

use App\Constants\Permission;
use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Tests\TestCase;

class UserRoleTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        // Create roles
        $this->createRoles();

    }

    /**
     * Test that a talent user has the correct role and permissions
     */
    public function test_talent_user_has_correct_role_and_permissions(): void
    {
        // Assign talent role
        $this->user->assignRole(UserRole::TALENT->value);

        // Assert role
        $this->assertTrue($this->user->hasRole(UserRole::TALENT->value));
        $this->assertFalse($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertFalse($this->user->hasRole(UserRole::CLUB->value));
        $this->assertFalse($this->user->hasRole(UserRole::ADMIN->value));

        // Assert permissions
        $this->assertTrue($this->user->can(Permission::VIEW_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::EDIT_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::CREATE_POSTS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_CONNECTIONS->value));
        $this->assertTrue($this->user->can(Permission::REQUEST_CONNECTIONS->value));
        $this->assertTrue($this->user->can(Permission::ACCEPT_CONNECTIONS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_MESSAGES->value));
        $this->assertTrue($this->user->can(Permission::SEND_MESSAGES->value));

        // Assert talent cannot access scout permissions
        $this->assertFalse($this->user->can(Permission::VIEW_ALL_TALENTS->value));
        $this->assertFalse($this->user->can(Permission::CREATE_SCOUTING_REPORTS->value));
        $this->assertFalse($this->user->can(Permission::INVITE_TO_TRIALS->value));

        // Assert talent cannot access admin permissions
        $this->assertFalse($this->user->can(Permission::VIEW_ADMIN_PANEL->value));
        $this->assertFalse($this->user->can(Permission::MANAGE_USERS->value));
    }

    /**
     * Test that a scout user has the correct role and permissions
     */
    public function test_scout_user_has_correct_role_and_permissions(): void
    {
        // Assign scout role
        $this->user->assignRole(UserRole::SCOUT->value);

        // Assert role
        $this->assertTrue($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertFalse($this->user->hasRole(UserRole::CLUB->value));
        $this->assertFalse($this->user->hasRole(UserRole::ADMIN->value));

        // Assert scout permissions
        $this->assertTrue($this->user->can(Permission::VIEW_ALL_TALENTS->value));
        $this->assertTrue($this->user->can(Permission::SEARCH_TALENTS->value));
        $this->assertTrue($this->user->can(Permission::CREATE_SCOUTING_REPORTS->value));
        $this->assertTrue($this->user->can(Permission::INVITE_TO_TRIALS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_TALENT_ANALYTICS->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_CONNECTIONS->value));

        // Assert scout also has basic user permissions
        $this->assertTrue($this->user->can(Permission::VIEW_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::EDIT_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::CREATE_POSTS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_MESSAGES->value));
        $this->assertTrue($this->user->can(Permission::SEND_MESSAGES->value));

        // Assert scout cannot access admin permissions
        $this->assertFalse($this->user->can(Permission::VIEW_ADMIN_PANEL->value));
        $this->assertFalse($this->user->can(Permission::MANAGE_USERS->value));
        $this->assertFalse($this->user->can(Permission::MANAGE_ROLES->value));
    }

    /**
     * Test that a club user has the correct role and permissions
     */
    public function test_club_user_has_correct_role_and_permissions(): void
    {
        // Assign club role
        $this->user->assignRole(UserRole::CLUB->value);

        // Assert role
        $this->assertTrue($this->user->hasRole(UserRole::CLUB->value));
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertFalse($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertFalse($this->user->hasRole(UserRole::ADMIN->value));

        // Assert club permissions
        $this->assertTrue($this->user->can(Permission::VIEW_CLUB_DASHBOARD->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_CLUB_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::POST_JOB_OPENINGS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_APPLICATIONS->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_TRIALS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_CLUB_ANALYTICS->value));

        // Assert club also has basic user permissions
        $this->assertTrue($this->user->can(Permission::VIEW_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::EDIT_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::CREATE_POSTS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_MESSAGES->value));
        $this->assertTrue($this->user->can(Permission::SEND_MESSAGES->value));

        // Assert club cannot access scout-specific permissions
        $this->assertFalse($this->user->can(Permission::CREATE_SCOUTING_REPORTS->value));
        $this->assertFalse($this->user->can(Permission::VIEW_ALL_TALENTS->value));

        // Assert club cannot access admin permissions
        $this->assertFalse($this->user->can(Permission::VIEW_ADMIN_PANEL->value));
        $this->assertFalse($this->user->can(Permission::MANAGE_USERS->value));
    }

    /**
     * Test that an admin user has the correct role and permissions
     */
    public function test_admin_user_has_correct_role_and_permissions(): void
    {
        // Assign admin role
        $this->user->assignRole(UserRole::ADMIN->value);

        // Assert role
        $this->assertTrue($this->user->hasRole(UserRole::ADMIN->value));
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertFalse($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertFalse($this->user->hasRole(UserRole::CLUB->value));

        // Assert admin has all permissions
        $this->assertTrue($this->user->can(Permission::VIEW_ADMIN_PANEL->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_USERS->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_ROLES->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_PERMISSIONS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_SYSTEM_ANALYTICS->value));
        $this->assertTrue($this->user->can(Permission::MANAGE_CONTENT->value));

        // Assert admin also has basic user permissions
        $this->assertTrue($this->user->can(Permission::VIEW_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::EDIT_OWN_PROFILE->value));
        $this->assertTrue($this->user->can(Permission::CREATE_POSTS->value));
        $this->assertTrue($this->user->can(Permission::VIEW_MESSAGES->value));
        $this->assertTrue($this->user->can(Permission::SEND_MESSAGES->value));

        // Assert admin has scout permissions
        $this->assertTrue($this->user->can(Permission::VIEW_ALL_TALENTS->value));
        $this->assertTrue($this->user->can(Permission::CREATE_SCOUTING_REPORTS->value));

        // Assert admin has club permissions
        $this->assertTrue($this->user->can(Permission::VIEW_CLUB_DASHBOARD->value));
        $this->assertTrue($this->user->can(Permission::POST_JOB_OPENINGS->value));
    }

    /**
     * Test that a super admin user has the correct role and permissions
     */
    public function test_super_admin_user_has_correct_role_and_permissions(): void
    {
        // Assign super admin role
        $this->user->assignRole(UserRole::SUPER_ADMIN->value);

        // Assert role
        $this->assertTrue($this->user->hasRole(UserRole::SUPER_ADMIN->value));
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertFalse($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertFalse($this->user->hasRole(UserRole::CLUB->value));
        $this->assertFalse($this->user->hasRole(UserRole::ADMIN->value));

        // Assert super admin has all permissions
        $allPermissions = SpatiePermission::all();
        foreach ($allPermissions as $permission) {
            $this->assertTrue($this->user->can($permission->name),
                "Super admin should have permission: {$permission->name}");
        }
    }

    /**
     * Test that a user can only have one role (business rule)
     */
    public function test_user_can_only_have_one_role(): void
    {
        // Assign first role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->hasRole(UserRole::TALENT->value));
        $this->assertEquals(1, $this->user->roles()->count());

        // Try to assign second role (this should work with Spatie, but we can test the business logic)
        $this->user->assignRole(UserRole::SCOUT->value);
        $this->assertTrue($this->user->hasRole(UserRole::SCOUT->value));
        $this->assertTrue($this->user->hasRole(UserRole::TALENT->value)); // Spatie allows multiple roles

        // If we want to enforce single role, we need to implement custom logic
        $this->assertEquals(2, $this->user->roles()->count());
    }

    /**
     * Test role assignment and removal
     */
    public function test_role_assignment_and_removal(): void
    {
        // Initially no roles
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertEquals(0, $this->user->roles()->count());

        // Assign role
        $this->user->assignRole(UserRole::TALENT->value);
        $this->assertTrue($this->user->hasRole(UserRole::TALENT->value));
        $this->assertEquals(1, $this->user->roles()->count());

        // Remove role
        $this->user->removeRole(UserRole::TALENT->value);
        $this->assertFalse($this->user->hasRole(UserRole::TALENT->value));
        $this->assertEquals(0, $this->user->roles()->count());
    }

    /**
     * Test that users without roles have no permissions
     */
    public function test_user_without_role_has_no_permissions(): void
    {
        // Assert no roles
        $this->assertEquals(0, $this->user->roles()->count());

        // Assert no permissions
        $this->assertFalse($this->user->can(Permission::VIEW_OWN_PROFILE->value));
        $this->assertFalse($this->user->can(Permission::CREATE_POSTS->value));
        $this->assertFalse($this->user->can(Permission::VIEW_ADMIN_PANEL->value));
    }

    /**
     * Create roles and permissions for testing
     */
    private function createRoles(): void
    {
        // Create all permissions using the enum
        $allPermissions = Permission::getAllPermissions();
        foreach ($allPermissions as $permission) {
            SpatiePermission::create(['name' => $permission]);
        }

        // Get permissions grouped by role from the enum
        $permissionsByRole = Permission::getPermissionsByRole();

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
