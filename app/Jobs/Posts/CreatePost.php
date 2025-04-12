<?php

namespace App\Jobs\Posts;

use App\Events\Posts\CreatedPost;
use App\JsonApi\V1\Posts\PostSchema;
use App\JsonApi\V1\Server;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class CreatePost implements ShouldQueue
{
    use Queueable;

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
        $server = app(Server::class, ['name' => 'v1']);

        $schema = new PostSchema($server);

        $post = $schema
            ->repository()
            ->create()
            ->store($this->attributes);

        createdPost::dispatch($post);
    }
}
