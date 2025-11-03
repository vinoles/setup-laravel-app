<?php

namespace Tests\Feature\Api\Club;

use App\Models\Club;
use Illuminate\Http\Response;
use Tests\Feature\Requests\Api\Club\RetrieveClubRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

class RetrieveClubTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the club
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_retrieve_club_if_not_logged_in(): void
    {
        $request = RetrieveClubRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetShow($request)
            ->assertUnauthorized()
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /**
     * A user logged in can retrieve the club
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function can_retrieve_club_if_is_logged_in(): void
    {
        $club = Club::factory()->create();

        $request = RetrieveClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiGetShow($request);

        $response->assertSuccessful();

        $response->assertStatus(Response::HTTP_OK);

        $data = $response->json('data');

        $this->assertEquals($data['id'], $club->uuid);
        $this->assertEquals('clubs', $data['type']);

        $this->assertDatabaseHas('clubs', [
            'id' => $club->id
        ]);
    }

    /**
     * A user cannot see a club that doesn't exist
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_see_a_club_that_doesnt_exist(): void
    {
        $club = Club::factory()->create();

        $request = RetrieveClubRequest::make($club);

        $club->delete();

        $response = $this->signIn($this->user)
            ->sendRequestApiGetShow($request);

        $response->assertNotFound();

        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $data = $response->json('errors');

        $response->assertStatus($data[0]["status"]);
    }
}

