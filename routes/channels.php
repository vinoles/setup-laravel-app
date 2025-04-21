<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{uuid}', function ($user, $uuid) {
    return (int) $user->uuid === (int) $uuid;
});

Broadcast::channel('post.fac0062d-0607-4b3d-98de-924b315fd68i', function ($user, $uuid) {
    // TODO LOGIC FOR AUTHORIZE EVENT
    return true;
});
