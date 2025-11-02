<?php

namespace Tests\Feature\Api\Club;

use App\Models\Club;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Club\DeleteClubRequest;

class DeleteClubTest extends TestCase
{
    /**
     * A user not logged in cannot delete the club
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_delete_club_if_not_logged_in(): void
    {
        $request = DeleteClubRequest::make();

        $this->signIn(null)
            ->sendRequestApiDelete($request)
            ->assertUnauthorized();
    }

    /**
     * Delete club happy path
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function delete_club_happy_path(): void
    {
        $club = Club::factory()->create();

        $request = DeleteClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertSuccessful();

        $response->assertNoContent();

        $this->assertDatabaseMissing('clubs', [
            'uuid' => $club->uuid,
            'name' => $club->name,
            'address' => $club->address,
        ]);
    }

    /**
     * Cannot delete club if the club not found.
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_delete_club_if_the_club_not_found(): void
    {
        $club = Club::factory()->create();

        $request = DeleteClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertSuccessful();

        $response->assertNoContent();

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);
        
        $response->assertNotFound();
    }
}

