<?php

namespace Tests\Feature\Api\Club;

use App\Models\Club;
use Tests\Feature\Requests\Api\Club\RetrieveClubsRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;

class RetrieveClubsTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the clubs
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_retrieve_clubs_if_not_logged_in(): void
    {
        $request = RetrieveClubsRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetList($request)
            ->assertUnauthorized();
    }

    /**
     * A user logged in can retrieve the clubs
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function can_retrieve_clubs_if_is_logged_in(): void
    {
        $clubs = Club::factory()->count(3)->create();

        $request = RetrieveClubsRequest::make();

        $response = $this->signIn($this->user)->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $this->assertEquals(count($response->json('data')), count($clubs));

        foreach ($clubs as $club) {
            $this->assertDatabaseHas('clubs', [
                'id' => $club->id,
            ]);
        }
    }

    /**
     * A user logged in can retrieve the clubs paged
     *
     * @return void
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function can_retrieve_clubs_if_is_logged_paged(): void
    {
        $clubs = Club::factory()->count(random_int(10, 100))->create();

        $page = random_int(1, 10);

        $size = random_int(5, 10);

        $total = $clubs->count();

        $pages = ceil($total / $size);

        $queryPage = ['page' => ['number' => $page, 'size' => $size]];

        $request = RetrieveClubsRequest::make($queryPage);

        $response = $this->signIn($this->user)->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $links = $response->json('links');

        $pageMetaInformation = $response->json('meta.page');

        $this->assertEquals($page, $pageMetaInformation['currentPage']);
        $this->assertEquals($total, $pageMetaInformation['total']);
        $this->assertEquals($size, $pageMetaInformation['perPage']);
        $this->assertEquals($pages, $pageMetaInformation['lastPage']);

        $this->assertIsArray($links);
    }
}

