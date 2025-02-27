<?php

namespace App\Observers;

use App\Models\Comment;
use Illuminate\Support\Str;


class CommentObserver
{
    /**
     * Triggered before creating an comment.
     *
     * @param  Comment  $comment
     * @return void
     */
    public function creating(Comment $comment): void
    {
        if ($comment->missingUuid()) {
            $comment->fill([
                'uuid' => Str::uuid(),
            ]);
        }
    }

    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "updated" event.
     */
    public function updated(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "restored" event.
     */
    public function restored(Comment $comment): void
    {
        //
    }

    /**
     * Handle the Comment "force deleted" event.
     */
    public function forceDeleted(Comment $comment): void
    {
        //
    }
}
