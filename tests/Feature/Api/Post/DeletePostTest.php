<?php

namespace Tests\Feature\Api\Post;

use App\Constants\UserRole;
use App\Events\Post\DeletedPost;
use App\Jobs\Posts\DeletePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Post\DeletePostRequest;
use Tests\Feature\TestCase;

class DeletePostTest extends TestCase
{
    /**
     * A user not logged in cannot delete the post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_delete_post_if_not_logged_in(): void
    {
        $request = DeletePostRequest::make();

        $this->signIn(null)
            ->sendRequestApiDelete($request)
            ->assertUnauthorized();
    }

    /**
     * Delete post happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function delete_post_happy_path(): void
    {
        Queue::fake([
            DeletePost::class,
        ]);

        Event::fake([
            DeletedPost::class,
        ]);

        $post = Post::factory()->create(['author_id' => $this->user->id]);

        $request = DeletePostRequest::make($post);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertOk();

        $data = $response->json('data');

        $this->assertEquals($post->uuid, $data['id']);

        $this->assertTrue($data['deleting']);

        Queue::assertPushed(DeletePost::class, function ($job) {
            $job->handle();

            return true;
        });

        $this->assertNull(Post::find($post->id));

        Event::assertDispatched(DeletedPost::class);
    }

    /**
     * Cannot delete post if the post not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_delete_post_if_the_post_not_found(): void
    {
        $post = Post::factory()->make();

        $request = DeletePostRequest::make($post);

        $response = $this->signIn($this->user)
            ->sendRequestApiDelete($request);

        $response->assertNotFound();
    }

    /**
     * Cannot delete post if user is not the author.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_delete_post_if_user_is_not_the_author(): void
    {
        Queue::fake([
            DeletePost::class,
        ]);

        Event::fake([
            DeletedPost::class,
        ]);

        $author = User::factory()->create();
        $otherUser = User::factory()->create();
        $otherUser->assignRole(UserRole::TALENT->value);

        // Create a published post so it can be found by the schema
        $post = Post::factory()->create([
            'author_id'    => $author->id,
            'published_at' => now(),
        ]);

        $request = DeletePostRequest::make($post);

        $response = $this->signIn($otherUser)
            ->sendRequestApiDelete($request);

        // Should return 403 Forbidden because the user is not the author
        $response->assertForbidden();

        Queue::assertNotPushed(DeletePost::class);

        // The job should NOT be dispatched because the policy prevents it
        Queue::assertNothingPushed();

        // The event should NOT be dispatched
        Event::assertNotDispatched(DeletedPost::class);
        Event::assertNothingDispatched();

        // The post should still exist
        $this->assertNotNull(Post::find($post->id));
    }
}

