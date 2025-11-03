<?php

namespace Tests\Feature\Api\Club;

use App\Models\Club;
use App\Models\User;
use Tests\Feature\Requests\Api\Club\CreateClubRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

class CreateClubTest extends TestCase
{
    /**
     * A user not logged in cannot create the club
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_create_club_if_not_logged_in(): void
    {
        $request = CreateClubRequest::make();

        $this->signIn(null)
            ->sendRequestApiPostWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Create club happy path
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function create_club_happy_path(): void
    {
        $club = Club::factory()->make();

        $request = CreateClubRequest::make($club);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPostWithData($request);

        $response->assertSuccessful();

        $data = $response->json('data');

        $this->assertSame($club->name, $data['attributes']['name']);
        $this->assertSame($club->address, $data['attributes']['address']);

        $this->assertDatabaseHas('clubs', [
            'name' => $club->name,
            'address' => $club->address,
        ]);
    }

    /**
     * Cannot create club if without the required data.
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_create_club_if_without_the_required_data(): void
    {
        $club = Club::factory()->make([
            'name'      => '',
            'address'   => '',
        ]);

        $request = CreateClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiPostWithData($request);

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

