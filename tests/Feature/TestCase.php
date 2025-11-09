<?php

namespace Tests\Feature;

use App\Constants\Permission;
use App\Constants\UserRole;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use LaravelJsonApi\Testing\MakesJsonApiRequests;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Models\Role;
use Tests\Feature\Concerns\CreatesUsers;
use Tests\Feature\Concerns\SendsRequests;
use Tests\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    use CreatesUsers;
    use MakesJsonApiRequests;
    use RefreshDatabase;
    use SendsRequests;

    /**
     * The authenticated user.
     *
     * @var \App\Models\User
     */
    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();

        // Create roles
        $this->createRoles();
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

    /**
     * Simulate the request from the user's perspective.
     *
     * @param  array|null  $scopes
     */
    protected function signIn(?User $user = null, $scopes = ['*']): static
    {
        $this->user = $user;

        if ($user !== null) {
            Sanctum::actingAs($this->user, $scopes);
        }

        return $this;
    }

    /**
     * Simulate the request from the user's perspective.
     *
     * @param  array|null  $scopes
     */
    protected function adminSignIn(?User $user = null): static
    {
        $this->user = $user;

        if ($user !== null) {
            // $this->actingAs($this->user);
            $this->actingAs($user, 'backpack');
        }

        return $this;
    }
}
