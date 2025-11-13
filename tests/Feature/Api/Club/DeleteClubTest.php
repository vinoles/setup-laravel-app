<?php

namespace Tests\Feature\Api\Club;

use App\Events\Club\ClubDeleted;
use App\Jobs\Clubs\DeleteClub;
use App\Models\Club;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Club\DeleteClubRequest;
use Tests\Feature\TestCase;

class DeleteClubTest extends TestCase
{
    /**
     * A user not logged in cannot delete the club
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
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function delete_club_happy_path(): void
    {
        Queue::fake([
            DeleteClub::class,
        ]);

        Event::fake([
            ClubDeleted::class,
        ]);

        $club = Club::factory()->create();

        $request = DeleteClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertOk();

        $data = $response->json('data');

        $this->assertEquals($club->uuid, $data['id']);

        $this->assertTrue($data['deleting']);

        Queue::assertPushed(DeleteClub::class, function ($job) {
            $job->handle();

            return true;
        });

        $this->assertNull(Club::find($club->id));

        Event::assertDispatched(ClubDeleted::class);
    }

    /**
     * Cannot delete club if the club not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_delete_club_if_the_club_not_found(): void
    {
        $club = Club::factory()->make();

        $request = DeleteClubRequest::make($club);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertNotFound();
    }
}
