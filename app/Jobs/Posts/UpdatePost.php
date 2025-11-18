<?php

namespace App\Jobs\Posts;

use App\Events\Post\UpdatedPost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\JsonApi\V1\Posts\PostSchema;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class UpdatePost implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Create a new event instance.
     */
    public function __construct(public Post $post, public array $attributes)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $server = $this->resolveServer();

        $schema = new PostSchema($server);

        $schema
            ->repository()
            ->update($this->post)
            ->store($this->attributes);

        UpdatedPost::dispatch($this->post);
    }
}

