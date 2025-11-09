<?php

namespace Tests\Feature\Api\Club;

use App\Models\Club;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Club\UpdateClubRequest;
use Tests\Feature\TestCase;

class UpdateClubTest extends TestCase
{
    /**
     * A user not logged in cannot update the club
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_update_club_if_not_logged_in(): void
    {
        $request = UpdateClubRequest::make();

        $this->signIn(null)
            ->sendRequestApiPatchWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Update club happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function update_club_happy_path(): void
    {
        $club = Club::factory()->create();

        $clubData = Club::factory()->make();

        $request = UpdateClubRequest::make($club)
            ->fillPayload($clubData);

        $response = $this->signIn($this->user)
            ->sendRequestApiPatchWithData($request);

        $response->assertSuccessful();

        $data = $response->json('data');

        $this->assertSame($clubData->name, $data['attributes']['name']);
        $this->assertSame($clubData->address, $data['attributes']['address']);

        $this->assertDatabaseHas('clubs', [
            'id'      => $club->id,
            'name'    => $clubData->name,
            'address' => $clubData->address,
        ]);
    }

    /**
     * Cannot update club if the club not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_update_club_if_the_club_not_found(): void
    {
        $club = Club::factory()->create();

        $clubData = Club::factory()->make();

        $request = UpdateClubRequest::make($clubData)
            ->fillPayload($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiPatchWithData($request);

        $response->assertNotFound();
    }

    /**
     * Cannot update club if without the required data.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_update_club_if_without_the_required_data(): void
    {
        $club = Club::factory()->create();

        $clubData = Club::factory()->make([
            'name'    => '',
            'address' => '',
        ]);

        $request = UpdateClubRequest::make($club)
            ->fillPayload($clubData);

        $response = $this->signIn($this->user)
            ->sendRequestApiPatchWithData($request);

        $response->assertUnprocessable();

        $errors = collect($response->json('errors'))->pluck('detail')->all();

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'name']),
            $errors
        );

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'address']),
            $errors
        );
    }
}
