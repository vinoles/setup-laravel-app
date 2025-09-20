<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{uuid}', function ($user, $uuid) {
    return (int) $user->uuid === (int) $uuid;
});

Broadcast::channel('post.{uuid}', function ($user, $uuid) {
    $post = \App\Models\Post::where('uuid', $uuid)->first();

    if (! $post) {
        return false;
    }

    return $user->is($post->author) || $user->isAnyAdmin();
});
