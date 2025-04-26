<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{uuid}', function ($user, $uuid) {
    return (int) $user->uuid === (int) $uuid;
});

Broadcast::channel('post.{uuid}', function ($user, $uuid) {
    // TODO LOGIC FOR AUTHORIZE EVENT
    return true;
});
