<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\ShowClubRequest;
use Tests\Feature\TestCase;

class ShowClubTest extends TestCase
{
    use RefreshDatabase;

    private Club $club;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->club = Club::factory()->create();
        $this->club->refresh();
    }

    /**
     * Cannot show club if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_show_club_if_is_unauthorized(): void
    {
        $request = ShowClubRequest::make($this->club->id);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can show club successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_show_club_successfully(): void
    {
        $request = ShowClubRequest::make($this->club->id);

        $response = $this->send($request);

        $response->assertSuccessful();
    }

    /**
     * Cannot show club if not found
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_show_club_if_not_found(): void
    {
        $nonExistentId = 99999;

        $request = ShowClubRequest::make($nonExistentId);

        $response = $this->send($request);

        $response->assertNotFound();
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(ShowClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}

