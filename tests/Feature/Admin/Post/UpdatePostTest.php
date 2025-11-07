<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\UpdatePostRequest;
use Tests\Feature\TestCase;

class UpdatePostTest extends TestCase
{
    use RefreshDatabase;

    private const TITLE_MIN_LENGTH = 2;
    private const CONTENT_MIN_LENGTH = 10;

    private Post $post;
    private Post $updatedPost;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->post = Post::factory()->for($this->user, 'author')->create();
        $this->post->refresh();

        $this->updatedPost = Post::factory()->make();
    }

    /**
     * Happy path: cannot update post if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_if_is_unauthorized(): void
    {
        $request = UpdatePostRequest::make($this->post, $this->updatedPost);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can update post successfully with valid data
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function can_update_post_with_valid_data(): void
    {
        $request = UpdatePostRequest::make($this->post, $this->updatedPost);

        $response = $this->send($request);

        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'id' => $this->post->id,
            'title' => $this->updatedPost->title,
            'content' => $this->updatedPost->content,
        ]);
    }

    /**
     * Cannot update post without title (required validation)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_without_title(): void
    {
        $request = UpdatePostRequest::make($this->post, null)->with([
            'title' => null,
            'content' => $this->updatedPost->content,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.required', ['attribute' => 'title']),
        ]);
    }

    /**
     * Cannot update post without content (required validation)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_without_content(): void
    {
        $request = UpdatePostRequest::make($this->post, null)->with([
            'title' => $this->updatedPost->title,
            'content' => null,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.required', ['attribute' => 'content']),
        ]);
    }

    /**
     * Cannot update post with title shorter than min length
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_with_title_too_short(): void
    {
        $shortTitle = Str::random(self::TITLE_MIN_LENGTH - 1);
        $request = UpdatePostRequest::make($this->post, $this->updatedPost)->with([
            'title' => $shortTitle,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.min.string', ['attribute' => 'title', 'min' => self::TITLE_MIN_LENGTH]),
        ]);
    }

    /**
     * Cannot update post with content shorter than min length
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_with_content_too_short(): void
    {
        $shortContent = Str::random(self::CONTENT_MIN_LENGTH - 1);
        $request = UpdatePostRequest::make($this->post, $this->updatedPost)->with([
            'content' => $shortContent,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.min.string', ['attribute' => 'content', 'min' => self::CONTENT_MIN_LENGTH]),
        ]);
    }

    /**
     * Cannot update post if title is not a string
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_with_title_not_string(): void
    {
        $request = UpdatePostRequest::make($this->post, $this->updatedPost)->with([
            'title' => 12345,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.string', ['attribute' => 'title']),
        ]);
    }

    /**
     * Cannot update post if content is not a string
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_post')]
    public function cannot_update_post_with_content_not_string(): void
    {
        $request = UpdatePostRequest::make($this->post, $this->updatedPost)->with([
            'content' => 12345,
        ]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.string', ['attribute' => 'content']),
        ]);
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(UpdatePostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
