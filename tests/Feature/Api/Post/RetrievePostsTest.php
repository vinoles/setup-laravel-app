<?php

namespace Tests\Feature\Api\Post;

use App\Models\Post;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Api\Post\RetrievePostsRequest;
use Tests\Feature\TestCase;

class RetrievePostsTest extends TestCase
{
    /**
     * A user not logged in cannot retrieve the posts
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function cannot_retrieve_posts_if_not_logged_in(): void
    {
        $request = RetrievePostsRequest::make();

        $this->signIn(null)
            ->sendRequestApiGetList($request)
            ->assertUnauthorized();
    }

    /**
     * A user logged in can retrieve the posts
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function can_retrieve_posts_if_is_logged_in(): void
    {
        $posts = Post::factory()->count(3)->create();

        $request = RetrievePostsRequest::make();

        $response = $this->signIn($this->user)->sendRequestApiGetList($request);

        $response->assertSuccessful();

        $this->assertEquals(count($response->json('data')), count($posts));

        foreach ($posts as $post) {
            $this->assertDatabaseHas('posts', [
                'id' => $post->id,
            ]);
        }
    }

    /**
     * A user logged in can retrieve the posts paged
     */
    #[Test]
    #[Group('api')]
    #[Group('api_post')]
    public function can_retrieve_posts_if_is_logged_paged(): void
    {
        $posts = Post::factory()->count(random_int(10, 100))->create();

        $page = random_int(1, 10);

        $size = random_int(5, 10);

        $total = $posts->count();

        $pages = ceil($total / $size);

        $queryPage = ['page' => ['number' => $page, 'size' => $size]];

        $request = RetrievePostsRequest::make($queryPage);

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

