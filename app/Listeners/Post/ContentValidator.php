<?php

namespace App\Listeners\Post;

use App\Events\Post\CreatedPost;
use App\Events\Post\ValidatedPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ContentValidator
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreatedPost $event): void
    {
        //TODO LOGIC VALIDATION CONTENT POST

        ValidatedPost::dispatch($event->post);
    }
}
