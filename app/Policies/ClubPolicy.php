<?php

namespace App\Policies;

use App\Models\User;

class ClubPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user, ?User $targetUser = null): bool
    {
        return true;
    }
}
