<?php

namespace Tests\Feature\Admin\Club;

use App\Constants\UserRole;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Club\DeleteClubRequest;
use Tests\Feature\TestCase;

class DeleteClubTest extends TestCase
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
     * Cannot delete club if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_delete_club_if_is_unauthorized(): void
    {
        $request = DeleteClubRequest::make($this->club->id);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can delete club successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function can_delete_club_successfully(): void
    {
        $request = DeleteClubRequest::make($this->club->id);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertDatabaseMissing('clubs', [
            'id' => $this->club->id,
        ]);
    }

    /**
     * Cannot delete club if not found
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_clubs')]
    public function cannot_delete_club_if_not_found(): void
    {
        // Use a non-existent ID
        $nonExistentId = 99999;

        $request = DeleteClubRequest::make($nonExistentId);

        $response = $this->send($request);

        $response->assertNotFound();
    }

    /**
     * Send a request with the authenticated admin user.
     *
     * @return \Illuminate\Testing\TestResponse
     */
    private function send(DeleteClubRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
