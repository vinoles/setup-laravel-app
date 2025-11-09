<?php

namespace App\Policies;

use App\Models\Federation;
use App\Models\User;

class FederationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Federation $federation): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the federation's leagues.
     */
    public function viewLeagues(?User $user, Federation $federation): bool
    {
        return $this->view($user, $federation);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Federation $federation): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Federation $federation): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Federation $federation): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Federation $federation): bool
    {
        return true;
    }
}
