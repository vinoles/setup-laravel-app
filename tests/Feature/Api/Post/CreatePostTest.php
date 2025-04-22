<?php

namespace Tests\Feature\Api\Post;

use App\Models\Post;
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

    // /**
    //  * Create post happy path
    //  *
    //  * @return void
    //  */
    // #[Test]
    // public function create_post_happy_path(): void
    // {
    //     $post = Post::factory()->make();

    //     $request = CreatePostRequest::make($post);

    //     $authPost = Post::factory()->create();

    //     $response = $this->signIn($authPost)
    //         ->sendRequestApiPostWithData($request);

    //     $response->assertSuccessful();

    //     $this->assertDatabaseHas('posts', [
    //         'first_name' => $post->first_name,
    //         'last_name' => $post->last_name,
    //         'address' => $post->address,
    //         'city' => $post->city,
    //         'country' => $post->country,
    //         'postal_code' => $post->postal_code,
    //         'phone' => $post->phone,
    //     ]);
    // }

}
