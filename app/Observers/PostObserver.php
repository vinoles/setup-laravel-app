<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Triggered before creating an post.
     *
     * @param  Post  $post
     * @return void
     */
    public function creating(Post $post): void
    {
        if ($post->missingUuid()) {
            $post->uuid = Str::uuid();
        }

        $shortUuid = Str::substr($post->uuid, -7);

        $post->slug = Str::slug("{$shortUuid} {$post->title}", '-');

        // Set author automatically if not provided
        if (empty($post->author_id) && function_exists('backpack_auth') && backpack_auth()->check()) {
            $post->author_id = backpack_auth()->id();
        }
    }

    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        $shortUuid = Str::substr($post->uuid, -7);

        $post->slug = Str::slug("{$shortUuid} {$post->title}", '-');

        Post::withoutEvents(function () use ($post) {
            $post->save();
        });
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
