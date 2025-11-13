<?php

use App\Models\Post;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{uuid}', function ($user, $uuid) {
    return (int) $user->uuid === (int) $uuid;
});

Broadcast::channel('post.{uuid}', function ($user, $uuid) {
    $post = Post::where('uuid', $uuid)->first();

    if (! $post) {
        return false;
    }

    return $user->is($post->author) || $user->isAnyAdmin();
});

Broadcast::channel('club.{uuid}', function ($user, $uuid) {
    // TODO LOGIC FOR AUTHORIZE EVENT
    return true;
});
