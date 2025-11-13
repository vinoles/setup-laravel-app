<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\ListClubRequest;
use Tests\Feature\TestCase;

class ListClubTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);
    }

    /**
     * Cannot list clubs if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_list_clubs_if_is_unauthorized(): void
    {
        $request = ListClubRequest::make();

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can list clubs successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_list_clubs_successfully(): void
    {
        Club::factory()->count(3)->create();

        $request = ListClubRequest::make();

        $response = $this->send($request);

        $response->assertSuccessful();
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(ListClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
