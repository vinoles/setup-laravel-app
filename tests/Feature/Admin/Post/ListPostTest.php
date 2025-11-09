<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\ListPostRequest;
use Tests\Feature\TestCase;

class ListPostTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);
    }

    /**
     * Cannot list posts if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_list_posts_if_is_unauthorized(): void
    {
        $request = ListPostRequest::make();

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can list posts successfully
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function can_list_posts_successfully(): void
    {
        Post::factory()->for($this->user, 'author')->count(3)->create();

        $request = ListPostRequest::make();

        $response = $this->send($request);

        $response->assertSuccessful();
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(ListPostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
