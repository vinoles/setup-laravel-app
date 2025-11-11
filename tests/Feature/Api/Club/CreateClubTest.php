<?php

namespace Tests\Feature\Api\Club;

use App\Events\Club\ClubCreated;
use App\Events\Club\ClubInformationValidated;
use App\Jobs\Clubs\CreateClub;
use App\Listeners\Club\ClubInformationValidator;
use App\Models\Club;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Club\CreateClubRequest;
use Tests\Feature\TestCase;

class CreateClubTest extends TestCase
{
    /**
     * A user not logged in cannot create the club
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

    //     /**
    //  * Create post  assert job pushed
    //  */
    // #[Test]
    // #[Group('api')]
    // #[Group('api_post')]
    // public function create_post_assert_job_pushed(): void
    // {
    //     Queue::fake([
    //         CreatePost::class,
    //     ]);

    //     $post = Post::factory()->make();

    //     $author = User::factory()->create();

    //     $relationships = [
    //         'author' => [
    //             'data' => [
    //                 'type' => 'users',
    //                 'id'   => $author->uuid,
    //             ],
    //         ],
    //     ];

    //     $request = CreatePostRequest::make($post, $relationships);

    //     $response = $this->signIn($author)
    //         ->sendRequestApiPostWithData($request);

    //     $response->assertSuccessful();

    //     Queue::assertPushed(
    //         CreatePost::class,
    //         function ($job) {
    //             return $job;
    //         }
    //     );
    // }

    /**
     * Create club happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function create_club_happy_path(): void
    {
        Event::fake([
            ClubCreated::class,
        ]);

        $club = Club::factory()->make();

        $request = CreateClubRequest::make($club);

        $authUser = User::factory()->create();

        $response = $this->signIn($authUser)
            ->sendRequestApiPostWithData($request);

        $response->assertSuccessful();

        $club = Club::first();

        Event::assertDispatched(ClubCreated::class, function ($event) use ($club) {
            return $event->club->uuid === $club->uuid;
        });

        Event::assertListening(
            ClubCreated::class,
            ClubInformationValidator::class
        );

        $data = $response->json('data');

        $this->assertSame($club->uuid, $data['id']);

        $this->assertTrue($data['creating']);

        $this->assertDatabaseHas('clubs', [
            'name'    => $club->name,
            'address' => $club->address,
        ]);
    }

    /**
     * Cannot create club if without the required data.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_club')]
    public function cannot_create_club_if_without_the_required_data(): void
    {
        $club = Club::factory()->make([
            'name'    => '',
            'address' => '',
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
