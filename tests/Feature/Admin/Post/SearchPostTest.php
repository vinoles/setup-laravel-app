<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\SearchPostRequest;
use Tests\Feature\TestCase;

class SearchPostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);
    }

    /**
     * Cannot search posts if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_search_posts_if_is_unauthorized(): void
    {
        $request = SearchPostRequest::make();

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can search posts successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function can_search_posts_successfully(): void
    {
        Post::factory()->for($this->user, 'author')->count(5)->create();

        $request = SearchPostRequest::make();

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 5);
        $this->assertSame($response->json('recordsTotal'), 5);
        $this->assertIsArray($response->json('data'));
        $this->assertCount(5, $response->json('data'));
    }

    /**
     * Can search posts with filters
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function can_search_posts_with_filters(): void
    {
        Post::factory()->for($this->user, 'author')->create([
            'title' => 'Barcelona news',
        ]);

        Post::factory()->for($this->user, 'author')->count(5)->create([
            'title' => 'Real Madrid news',
        ]);

        $filter['search'] = ['value' => 'Barcelona'];

        $request = SearchPostRequest::make($filter);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 1);
        $this->assertSame($response->json('recordsTotal'), 6);

        $response->assertSee('Barcelona news');
    }

    /**
     * Can search posts and returns empty when no matches
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function can_search_posts_returns_empty_when_no_matches(): void
    {
        Post::factory()->for($this->user, 'author')->count(3)->create([
            'title' => 'Real Madrid news',
        ]);

        $filter['search'] = ['value' => 'Barcelona'];

        $request = SearchPostRequest::make($filter);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertSame($response->json('recordsFiltered'), 0);
        $this->assertSame($response->json('recordsTotal'), 3);
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(SearchPostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
