<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\ShowPostRequest;
use Tests\Feature\TestCase;

class ShowPostTest extends TestCase
{
    use RefreshDatabase;

    private Post $post;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->post = Post::factory()->for($this->user, 'author')->create();
        $this->post->refresh();
    }

    /**
     * Cannot show post if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_show_post_if_is_unauthorized(): void
    {
        $request = ShowPostRequest::make($this->post);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can show post successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function can_show_post_successfully(): void
    {
        $request = ShowPostRequest::make($this->post);

        $response = $this->send($request);

        $response->assertSuccessful();
        $response->assertSee((string) $this->post->id);
        $response->assertSee($this->post->title);
    }

    /**
     * Cannot show post if not found
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_show_post_if_not_found(): void
    {
        $nonExistentId = 99999;

        $request = ShowPostRequest::make($nonExistentId);

        $response = $this->send($request);

        $response->assertNotFound();
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(ShowPostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
