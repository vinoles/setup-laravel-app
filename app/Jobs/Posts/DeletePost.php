<?php

namespace App\Jobs\Posts;

use App\Events\Post\DeletedPost;
use App\JsonApi\V1\Helpers\ResolvesJsonApiServer;
use App\Models\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class DeletePost implements ShouldQueue
{
    use Queueable;
    use ResolvesJsonApiServer;

    /**
     * Create a new event instance.
     */
    public function __construct(protected Post $post)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // TODO: something custom logic...
        $postId = $this->post->uuid;

        $this->post->delete();

        DeletedPost::dispatch($postId);
    }
}

