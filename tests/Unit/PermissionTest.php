<?php

namespace Tests\Unit;

use App\Constants\Permission;
use App\Constants\UserRole;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    /**
     * Test that base permissions are correctly included in talent role
     * (Testing private getBasePermissions through public getPermissionsByRole)
     */
    public function test_base_permissions_are_included_in_talent_role(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];

        $expectedBasePermissions = [
            Permission::VIEW_OWN_PROFILE->value,
            Permission::EDIT_OWN_PROFILE->value,
            Permission::CREATE_POSTS->value,
            Permission::VIEW_CONNECTIONS->value,
            Permission::REQUEST_CONNECTIONS->value,
            Permission::ACCEPT_CONNECTIONS->value,
            Permission::VIEW_MESSAGES->value,
            Permission::SEND_MESSAGES->value,
        ];

        $this->assertEquals($expectedBasePermissions, $talentPermissions);
        $this->assertCount(8, $talentPermissions);
    }

    /**
     * Test that scout specific permissions are correctly included in scout role
     * (Testing private getScoutSpecificPermissions through public getPermissionsByRole)
     */
    public function test_scout_specific_permissions_are_included_in_scout_role(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $scoutPermissions = $permissionsByRole[UserRole::SCOUT->value];
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];

        $expectedScoutSpecificPermissions = [
            Permission::VIEW_ALL_TALENTS->value,
            Permission::SEARCH_TALENTS->value,
            Permission::CREATE_SCOUTING_REPORTS->value,
            Permission::INVITE_TO_TRIALS->value,
            Permission::VIEW_TALENT_ANALYTICS->value,
            Permission::MANAGE_CONNECTIONS->value,
        ];

        // Scout should have all talent permissions plus scout specific ones
        $this->assertCount(14, $scoutPermissions); // 8 base + 6 scout specific
        
        // Check that scout has all base permissions
        foreach ($talentPermissions as $permission) {
            $this->assertContains($permission, $scoutPermissions);
        }

        // Check that scout has all scout specific permissions
        foreach ($expectedScoutSpecificPermissions as $permission) {
            $this->assertContains($permission, $scoutPermissions);
        }
    }

    /**
     * Test that club specific permissions are correctly included in club role
     * (Testing private getClubSpecificPermissions through public getPermissionsByRole)
     */
    public function test_club_specific_permissions_are_included_in_club_role(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $clubPermissions = $permissionsByRole[UserRole::CLUB->value];
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];

        $expectedClubSpecificPermissions = [
            Permission::VIEW_CLUB_DASHBOARD->value,
            Permission::MANAGE_CLUB_PROFILE->value,
            Permission::POST_JOB_OPENINGS->value,
            Permission::VIEW_APPLICATIONS->value,
            Permission::MANAGE_TRIALS->value,
            Permission::VIEW_CLUB_ANALYTICS->value,
        ];

        // Club should have all talent permissions plus club specific ones
        $this->assertCount(14, $clubPermissions); // 8 base + 6 club specific
        
        // Check that club has all base permissions
        foreach ($talentPermissions as $permission) {
            $this->assertContains($permission, $clubPermissions);
        }

        // Check that club has all club specific permissions
        foreach ($expectedClubSpecificPermissions as $permission) {
            $this->assertContains($permission, $clubPermissions);
        }
    }

    /**
     * Test that admin specific permissions are correctly included in admin role
     * (Testing private getAdminSpecificPermissions through public getPermissionsByRole)
     */
    public function test_admin_specific_permissions_are_included_in_admin_role(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $adminPermissions = $permissionsByRole[UserRole::ADMIN->value];

        $expectedAdminSpecificPermissions = [
            Permission::VIEW_ADMIN_PANEL->value,
            Permission::MANAGE_USERS->value,
            Permission::MANAGE_ROLES->value,
            Permission::MANAGE_PERMISSIONS->value,
            Permission::VIEW_SYSTEM_ANALYTICS->value,
            Permission::MANAGE_CONTENT->value,
        ];

        // Admin should have all permissions (26 total)
        $this->assertCount(26, $adminPermissions);

        // Check that admin has all admin specific permissions
        foreach ($expectedAdminSpecificPermissions as $permission) {
            $this->assertContains($permission, $adminPermissions);
        }
    }

    /**
     * Test that getPermissionsByRole returns correct structure and permissions for each role
     */
    public function test_get_permissions_by_role_returns_correct_structure(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();

        // Test that all expected roles are present
        $this->assertArrayHasKey(UserRole::TALENT->value, $permissionsByRole);
        $this->assertArrayHasKey(UserRole::SCOUT->value, $permissionsByRole);
        $this->assertArrayHasKey(UserRole::CLUB->value, $permissionsByRole);
        $this->assertArrayHasKey(UserRole::ADMIN->value, $permissionsByRole);

        // Test talent permissions (should only have base permissions)
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];
        $this->assertCount(8, $talentPermissions);

        // Test scout permissions (should have base + scout specific)
        $scoutPermissions = $permissionsByRole[UserRole::SCOUT->value];
        $this->assertCount(14, $scoutPermissions); // 8 base + 6 scout specific

        // Test club permissions (should have base + club specific)
        $clubPermissions = $permissionsByRole[UserRole::CLUB->value];
        $this->assertCount(14, $clubPermissions); // 8 base + 6 club specific

        // Test admin permissions (should have all permissions)
        $adminPermissions = $permissionsByRole[UserRole::ADMIN->value];
        $this->assertCount(26, $adminPermissions); // All unique permissions
    }

    /**
     * Test that getPermissionsByRole returns unique permissions for admin role
     */
    public function test_get_permissions_by_role_admin_has_unique_permissions(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $adminPermissions = $permissionsByRole[UserRole::ADMIN->value];

        // Check that admin has all expected permissions
        $this->assertContains(Permission::VIEW_OWN_PROFILE->value, $adminPermissions);
        $this->assertContains(Permission::VIEW_ALL_TALENTS->value, $adminPermissions);
        $this->assertContains(Permission::VIEW_CLUB_DASHBOARD->value, $adminPermissions);
        $this->assertContains(Permission::VIEW_ADMIN_PANEL->value, $adminPermissions);

        // Check that there are no duplicate permissions
        $this->assertEquals($adminPermissions, array_unique($adminPermissions));
    }

    /**
     * Test that getAllPermissions returns all unique permissions
     */
    public function test_get_all_permissions_returns_all_unique_permissions(): void
    {
        $allPermissions = Permission::getAllPermissions();

        // Should contain all permission values
        $this->assertContains(Permission::VIEW_OWN_PROFILE->value, $allPermissions);
        $this->assertContains(Permission::VIEW_ALL_TALENTS->value, $allPermissions);
        $this->assertContains(Permission::VIEW_CLUB_DASHBOARD->value, $allPermissions);
        $this->assertContains(Permission::VIEW_ADMIN_PANEL->value, $allPermissions);

        // Should not have duplicates
        $this->assertEquals($allPermissions, array_unique($allPermissions));

        // Should have the correct total count (all unique permissions)
        $this->assertCount(26, $allPermissions);
    }

    /**
     * Test that getAllPermissions matches the result from getPermissionsByRole
     */
    public function test_get_all_permissions_matches_permissions_by_role(): void
    {
        $allPermissions = Permission::getAllPermissions();
        $permissionsByRole = Permission::getPermissionsByRole();

        // Get all permissions from the role-based method
        $allPermissionsFromRoles = array_unique(array_merge(...array_values($permissionsByRole)));

        $this->assertEquals($allPermissionsFromRoles, $allPermissions);
    }

    /**
     * Test that permission values are strings
     */
    public function test_permission_values_are_strings(): void
    {
        $allPermissions = Permission::getAllPermissions();

        foreach ($allPermissions as $permission) {
            $this->assertIsString($permission);
            $this->assertNotEmpty($permission);
        }
    }

    /**
     * Test that permission values follow the expected naming convention
     */
    public function test_permission_values_follow_naming_convention(): void
    {
        $allPermissions = Permission::getAllPermissions();

        foreach ($allPermissions as $permission) {
            // Should be lowercase with underscores
            $this->assertMatchesRegularExpression('/^[a-z_]+$/', $permission);
            // Should not start or end with underscore
            $this->assertStringStartsNotWith('_', $permission);
            $this->assertStringEndsNotWith('_', $permission);
        }
    }

    /**
     * Test that each role has the expected number of permissions
     */
    public function test_each_role_has_expected_permission_count(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();

        // Talent: 8 base permissions
        $this->assertCount(8, $permissionsByRole[UserRole::TALENT->value]);

        // Scout: 8 base + 6 scout specific = 14 permissions
        $this->assertCount(14, $permissionsByRole[UserRole::SCOUT->value]);

        // Club: 8 base + 6 club specific = 14 permissions
        $this->assertCount(14, $permissionsByRole[UserRole::CLUB->value]);

        // Admin: all unique permissions = 26 permissions
        $this->assertCount(26, $permissionsByRole[UserRole::ADMIN->value]);
    }

    /**
     * Test that scout and club permissions don't overlap with each other
     * (Testing through public getPermissionsByRole method)
     */
    public function test_scout_and_club_specific_permissions_dont_overlap(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $scoutPermissions = $permissionsByRole[UserRole::SCOUT->value];
        $clubPermissions = $permissionsByRole[UserRole::CLUB->value];
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];

        // Get scout specific permissions (scout permissions minus base permissions)
        $scoutSpecific = array_diff($scoutPermissions, $talentPermissions);
        
        // Get club specific permissions (club permissions minus base permissions)
        $clubSpecific = array_diff($clubPermissions, $talentPermissions);

        $overlap = array_intersect($scoutSpecific, $clubSpecific);
        $this->assertEmpty($overlap, 'Scout and club specific permissions should not overlap');
    }

    /**
     * Test that admin permissions include all other permission categories
     * (Testing through public getPermissionsByRole method)
     */
    public function test_admin_permissions_include_all_categories(): void
    {
        $permissionsByRole = Permission::getPermissionsByRole();
        $adminPermissions = $permissionsByRole[UserRole::ADMIN->value];
        $scoutPermissions = $permissionsByRole[UserRole::SCOUT->value];
        $clubPermissions = $permissionsByRole[UserRole::CLUB->value];
        $talentPermissions = $permissionsByRole[UserRole::TALENT->value];

        // Admin should have all permissions from all roles
        foreach ($talentPermissions as $permission) {
            $this->assertContains($permission, $adminPermissions);
        }
        
        foreach ($scoutPermissions as $permission) {
            $this->assertContains($permission, $adminPermissions);
        }
        
        foreach ($clubPermissions as $permission) {
            $this->assertContains($permission, $adminPermissions);
        }

        // Admin should have more permissions than any individual role
        $this->assertGreaterThan(count($scoutPermissions), count($adminPermissions));
        $this->assertGreaterThan(count($clubPermissions), count($adminPermissions));
        $this->assertGreaterThan(count($talentPermissions), count($adminPermissions));
    }
}
