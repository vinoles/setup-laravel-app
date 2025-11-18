<?php

namespace Tests\Feature\Api\Post;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Response;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Post\RetrievePostRequest;
use Tests\Feature\TestCase;

class RetrievePostTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_retrieve_post_if_not_logged_in(): void
    {
        $request = RetrievePostRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetShow($request)
            ->assertUnauthorized()
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    /**
     * A user logged in can retrieve published post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function can_retrieve_published_post_if_is_logged_in(): void
    {
        $post = Post::factory()->create([
            'author_id'    => $this->user->id,
            'published_at' => now(),
        ]);

        $request = RetrievePostRequest::make($post);

        $response = $this->signIn($this->user)
            ->sendRequestApiGetShow($request);

        $response->assertSuccessful();

        $response->assertStatus(Response::HTTP_OK);

        $data = $response->json('data');

        $this->assertEquals($data['id'], $post->uuid);
        $this->assertEquals('posts', $data['type']);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
        ]);
    }

    /**
     * Author can retrieve their own unpublished post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function author_can_retrieve_their_own_unpublished_post(): void
    {
        $author = User::factory()->create();
        $post = Post::factory()->create([
            'author_id'    => $author->id,
            'published_at' => null,
        ]);

        $request = RetrievePostRequest::make($post);

        $response = $this->signIn($author)
            ->sendRequestApiGetShow($request);

        $response->assertSuccessful();

        $data = $response->json('data');

        $this->assertEquals($data['id'], $post->uuid);
        $this->assertEquals('posts', $data['type']);
    }

    /**
     * Other user cannot retrieve unpublished post
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function other_user_cannot_retrieve_unpublished_post(): void
    {
        $author = User::factory()->create();

        $otherUser = User::factory()->create();

        $post = Post::factory()->create([
            'author_id'    => $author->id,
            'published_at' => null,
        ]);

        $request = RetrievePostRequest::make($post);

        $response = $this->signIn($otherUser)
            ->sendRequestApiGetShow($request);

        $response->assertForbidden();
    }

    /**
     * A user cannot see a post that doesn't exist
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_see_a_post_that_doesnt_exist(): void
    {
        $post = Post::factory()->create();

        $request = RetrievePostRequest::make($post);

        $post->delete();

        $response = $this->signIn($this->user)
            ->sendRequestApiGetShow($request);

        $response->assertNotFound();

        $response->assertStatus(Response::HTTP_NOT_FOUND);

        $data = $response->json('errors');

        $response->assertStatus($data[0]['status']);
    }
}

