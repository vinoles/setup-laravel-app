<?php

namespace App\Models\Concerns;

use App\Constants\UserRole;

trait HasUserRoles
{
    /**
     * Check if the user has admin role.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(UserRole::ADMIN->value);
    }

    /**
     * Check if the user has super admin role.
     */
    public function isSuperAdmin(): bool
    {
        return $this->hasRole(UserRole::SUPER_ADMIN->value);
    }

    /**
     * Check if the user has talent role.
     */
    public function isTalent(): bool
    {
        return $this->hasRole(UserRole::TALENT->value);
    }

    /**
     * Check if the user has scout role.
     */
    public function isScout(): bool
    {
        return $this->hasRole(UserRole::SCOUT->value);
    }

    /**
     * Check if the user has club role.
     */
    public function isClub(): bool
    {
        return $this->hasRole(UserRole::CLUB->value);
    }

    /**
     * Check if the user has any admin role (admin or super admin).
     */
    public function isAnyAdmin(): bool
    {
        return $this->hasAnyRole([UserRole::ADMIN->value, UserRole::SUPER_ADMIN->value]);
    }

    /**
     * Check if the user has any of the specified roles.
     *
     * @param  array|string  $roles
     */
    public function hasAnyOfRoles($roles): bool
    {
        return $this->hasAnyRole($roles);
    }

    /**
     * Get the user's primary role.
     */
    public function getPrimaryRole(): ?string
    {
        $roles = $this->getRoleNames();

        // Priority order: super_admin > admin > club > scout > talent
        $priority = [
            UserRole::SUPER_ADMIN->value,
            UserRole::ADMIN->value,
            UserRole::CLUB->value,
            UserRole::SCOUT->value,
            UserRole::TALENT->value,
        ];

        foreach ($priority as $role) {
            if ($roles->contains($role)) {
                return $role;
            }
        }

        return $roles->first();
    }
}
