<?php

namespace Tests\Feature;

use App\Models\User;
use App\Constants\Permission;
use App\Constants\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use LaravelJsonApi\Testing\MakesJsonApiRequests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Tests\Feature\Concerns\CreatesUsers;
use Tests\Feature\Concerns\SendsRequests;
use Tests\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesUsers, MakesJsonApiRequests, SendsRequests, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        // Create roles
        $this->createRoles();
    }

    /**
     * The authenticated user.
     *
     * @var \App\Models\User
     */
    protected $user;

    /**
     * Simulate the request from the user's perspective.
     *
     * @param  \App\Models\User|null  $user
     * @param  array|null  $scopes
     * @return static
     */
    protected function signIn(User $user = null, $scopes = ['*']): static
    {
        $this->user = $user;

        if($user !== null) {
            Sanctum::actingAs($this->user, $scopes);
        }

        return $this;
    }

    /**
     * Simulate the request from the user's perspective.
     *
     * @param  \App\Models\User|null  $user
     * @param  array|null  $scopes
     * @return static
     */
    protected function adminSignIn(User $user = null): static
    {
        $this->user = $user;

        if($user !== null) {
            // $this->actingAs($this->user);
            $this->actingAs($user, 'backpack');
        }

        return $this;
    }

    /**
     * Create roles and permissions for testing
     */
    public function createRoles(): void
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
