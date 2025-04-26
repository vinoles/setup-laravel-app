<?php

namespace App\Jobs\Posts;

use App\Events\Post\CreatedPost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\JsonApi\V1\Posts\PostSchema;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CreatePost implements ShouldQueue
{
    use Queueable,
        ResolvesJsonApiServer;

    /**
     * Create a new job instance.
     *
     * @param array $attributes
     */
    public function __construct(protected array $attributes)
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

        $post = $schema
            ->repository()
            ->create()
            ->store($this->attributes);

        CreatedPost::dispatch($post);
    }
}
