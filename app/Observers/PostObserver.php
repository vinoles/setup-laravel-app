<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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
            $uuid = Str::uuid();

            $shortUuid = Str::substr($uuid, -7);

            $post->fill([
                'uuid' => $uuid,
                'slug' =>  Str::slug("{$shortUuid} {$post->title}", '-')
            ]);
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
        //
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
