<?php

namespace Tests\Feature\Admin\Post;

use App\Constants\UserRole;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\Feature\Requests\Admin\Post\CreatePostRequest;
use Tests\Feature\TestCase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    private const TITLE_MIN_LENGTH = 2;
    private const CONTENT_MIN_LENGTH = 10;

    private Post $post;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user->assignRole(UserRole::ADMIN->value);

        $this->post = Post::factory()->make();
    }

    /**
     * Happy path: cannot create post if is unauthorized
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_if_is_unauthorized(): void
    {
        $request = CreatePostRequest::make($this->post);

        $this->user->removeRole(UserRole::ADMIN->value);

        $response = $this->send($request);

        $response->assertUnauthorized();
    }

    /**
     * Happy path: can create post successfully with valid data
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function can_create_post_with_valid_data(): void
    {
        $request = CreatePostRequest::make($this->post);

        $response = $this->send($request);

        $response->assertRedirect();

        $this->assertDatabaseHas('posts', [
            'title'   => $this->post->title,
            'content' => $this->post->content,
        ]);
    }

    /**
     * Cannot create post without title (required validation)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_without_title(): void
    {
        $request = CreatePostRequest::make()->with(['content' => $this->post->content]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.required', ['attribute' => 'title']),
        ]);
    }

    /**
     * Cannot create post without content (required validation)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_without_content(): void
    {
        $request = CreatePostRequest::make()->with(['title' => $this->post->title]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.required', ['attribute' => 'content']),
        ]);
    }

    /**
     * Cannot create post with title shorter than min length (min:2)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_with_title_too_short(): void
    {
        $shortTitle = Str::random(self::TITLE_MIN_LENGTH - 1);
        $request = CreatePostRequest::make($this->post)->with(['title' => $shortTitle]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.min.string', ['attribute' => 'title', 'min' => self::TITLE_MIN_LENGTH]),
        ]);
    }

    /**
     * Cannot create post with content shorter than min length (min:10)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_with_content_too_short(): void
    {
        $shortContent = Str::random(self::CONTENT_MIN_LENGTH - 1);
        $request = CreatePostRequest::make($this->post)->with(['content' => $shortContent]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.min.string', ['attribute' => 'content', 'min' => self::CONTENT_MIN_LENGTH]),
        ]);
    }

    /**
     * Cannot create post if title is not a string
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_with_title_not_string(): void
    {
        $request = CreatePostRequest::make($this->post)->with(['title' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'title' => __('validation.string', ['attribute' => 'title']),
        ]);
    }

    /**
     * Cannot create post if content is not a string
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function cannot_create_post_with_content_not_string(): void
    {
        $request = CreatePostRequest::make($this->post)->with(['content' => 12345]);

        $response = $this->send($request);

        $response->assertInvalid([
            'content' => __('validation.string', ['attribute' => 'content']),
        ]);
    }

    /**
     * Slug should be auto-generated on create (observer)
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function can_generate_slug_on_create(): void
    {
        $request = CreatePostRequest::make($this->post);

        $this->send($request)->assertRedirect();

        $created = Post::query()->latest('id')->first();

        $this->assertNotNull($created);
        $this->assertNotEmpty($created->slug);

        $expectedTitleSlug = Str::slug($this->post->title);
        $this->assertMatchesRegularExpression(
            '/^[a-z0-9]{7}-' . preg_quote($expectedTitleSlug, '/') . '$/i',
            $created->slug
        );
    }

    /**
     * Author should be set automatically to the authenticated user on create
     */
    #[Test]
    #[Group('admin')]
    #[Group('admin_posts')]
    public function sets_author_id_automatically_when_authenticated(): void
    {
        $request = CreatePostRequest::make($this->post);

        $this->send($request)->assertRedirect();

        $created = Post::query()->latest('id')->first();

        $this->assertNotNull($created);
        $this->assertSame($this->user->id, $created->author_id);
    }

    /**
     * Send a request with the authenticated admin user.
     */
    private function send(CreatePostRequest $request)
    {
        return $this->adminSignIn($this->user)->sendRequest($request);
    }
}
