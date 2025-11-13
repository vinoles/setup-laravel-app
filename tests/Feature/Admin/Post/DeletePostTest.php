<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\DeletePostRequest;
use Tests\Feature\TestCase;

class DeletePostTest extends TestCase
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
     * Cannot delete post if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_delete_post_if_is_unauthorized(): void
    {
        $request = DeletePostRequest::make($this->post->id);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can delete post successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function can_delete_post_successfully(): void
    {
        $request = DeletePostRequest::make($this->post->id);

        $response = $this->send($request);

        $response->assertSuccessful();

        $this->assertDatabaseMissing('posts', [
            'id' => $this->post->id,
        ]);
    }

    /**
     * Cannot delete post if not found
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_delete_post_if_not_found(): void
    {
        $nonExistentId = 99999;

        $request = DeletePostRequest::make($nonExistentId);

        $response = $this->send($request);

        $response->assertNotFound();
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(DeletePostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
