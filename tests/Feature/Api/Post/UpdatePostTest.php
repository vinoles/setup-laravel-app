<?php

namespace Tests\Feature\Api\Post;

use App\Events\Post\UpdatedPost;
use App\Jobs\Posts\UpdatePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Post\UpdatePostRequest;
use Tests\Feature\TestCase;

class UpdatePostTest extends TestCase
{
    /**
     * A user not logged in cannot update the post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_update_post_if_not_logged_in(): void
    {
        $request = UpdatePostRequest::make();

        $this->signIn(null)
            ->sendRequestApiPatchWithData($request)
            ->assertUnauthorized();
    }

    /**
     * Update post  assert job pushed
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function update_post_assert_job_pushed(): void
    {
        Queue::fake([
            UpdatePost::class,
        ]);

        $author = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $author->id]);

        $postData = Post::factory()->make();

        $request = UpdatePostRequest::make($post)
            ->fillPayload($postData);

        $response = $this->signIn($author)
            ->sendRequestApiPatchWithData($request);

        $response->assertSuccessful();

        Queue::assertPushed(
            UpdatePost::class,
            function ($job) use ($post, $postData) {
                return $job->post->is($post) &&
                    $job->attributes['title'] === $postData->title;
            }
        );
    }

    /**
     * Update post happy path
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function update_post_happy_path(): void
    {
        Event::fake([
            UpdatedPost::class,
        ]);

        $author = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $author->id]);

        $postData = Post::factory()->make();

        $request = UpdatePostRequest::make($post)
            ->fillPayload($postData);

        $response = $this->signIn($author)
            ->sendRequestApiPatchWithData($request);

        $response->assertSuccessful();

        Event::assertDispatched(UpdatedPost::class, function ($event) use ($post) {
            return $event->post->uuid == $post->uuid;
        });

        $data = $response->json('data');

        $this->assertEquals($post->uuid, $data['id']);

        $this->assertTrue($data['updating']);

        $this->assertDatabaseHas('posts', [
            'id'      => $post->id,
            'title'   => $postData->title,
            'content' => $postData->content,
        ]);
    }

    /**
     * Cannot update post if the post not found.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_update_post_if_the_post_not_found(): void
    {
        $post = Post::factory()->create();
        $postData = Post::factory()->make();

        $request = UpdatePostRequest::make($postData)
            ->fillPayload($post);

        $response = $this->signIn($this->user)
            ->sendRequestApiPatchWithData($request);

        $response->assertNotFound();
    }

    /**
     * Cannot update post if without the required data.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_update_post_if_without_the_required_data(): void
    {
        $author = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $author->id]);

        $postData = Post::factory()->make([
            'title'   => '',
            'content' => '',
        ]);

        $request = UpdatePostRequest::make($post)
            ->fillPayload($postData);

        $response = $this->signIn($author)
            ->sendRequestApiPatchWithData($request);

        $response->assertUnprocessable();

        $errors = collect($response->json('errors'))->pluck('detail')->all();

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'title']),
            $errors
        );

        $this->assertContainsEquals(
            trans('validation.required', ['attribute' => 'content']),
            $errors
        );
    }

    /**
     * Cannot update post if user is not the author.
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_update_post_if_user_is_not_the_author(): void
    {
        $author = User::factory()->create();
        $otherUser = User::factory()->create();
        $post = Post::factory()->create(['author_id' => $author->id]);

        $postData = Post::factory()->make();

        $request = UpdatePostRequest::make($post)
            ->fillPayload($postData);

        $response = $this->signIn($otherUser)
            ->sendRequestApiPatchWithData($request);

        $response->assertForbidden();
    }
}

