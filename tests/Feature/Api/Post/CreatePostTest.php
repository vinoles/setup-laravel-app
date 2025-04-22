<?php

namespace Tests\Feature\Api\Post;

use App\Events\Posts\CreatedPost;
use App\Jobs\Posts\CreatePost;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Tests\Feature\Requests\Api\Post\CreatePostRequest;
use Tests\Feature\TestCase;
use PHPUnit\Framework\Attributes\Test;

class CreatePostTest extends TestCase
{
    /**
    * A post not logged in cannot create the post
    *
    * @return void
    */
    #[Test]
    public function cannot_create_post_if_not_logged_in(): void
    {
        $request = CreatePostRequest::make();

        $this->signIn(null)
            ->sendRequestApiPostWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Create post  assert job pushed
     *
     * @return void
     */
    #[Test]
    public function create_post_assert_job_pushed(): void
    {
        Queue::fake([
            CreatePost::class
        ]);

        $post = Post::factory()->make();

        $author = User::factory()->create();

        $relationships = [
            'author' => [
                'data' => [
                    'type' => 'users',
                    'id'    => $author->uuid
                ]
            ]
        ];

        $request = CreatePostRequest::make($post, $relationships);

        $response = $this->signIn($author)
            ->sendRequestApiPostWithData($request);

        $response->assertSuccessful();

        Queue::assertPushed(
            CreatePost::class,
            function ($job) {
                return $job;
            }
        );
    }

    /**
     * Create post persists in DB and dispatches CreatedPost event
     *
    * @return void
    */
    #[Test]
    public function create_post_persists_and_dispatches_event(): void
    {

        Event::fake([
            CreatedPost::class
        ]);

        $post = Post::factory()->make();

        $author = User::factory()->create();

        $relationships = [
            'author' => [
                'data' => [
                    'type' => 'users',
                    'id'    => $author->uuid
                ]
            ]
        ];

        $request = CreatePostRequest::make($post, $relationships);

        $response = $this->signIn($author)
            ->sendRequestApiPostWithData($request);

        $response->assertSuccessful();

        $author->refresh();

        $post = $author->posts()->first();

        Event::assertDispatched(CreatedPost::class, function ($event) use ($post) {
            return $event->post->uuid === $post->uuid;
        });

        $this->assertDatabaseHas('posts', [
            'id'        => $post->id,
            'uuid'      => $post->uuid,
            'title'     => $post->title,
            'content'   => $post->content,
            'slug'      => $post->slug,
        ]);
    }
}
