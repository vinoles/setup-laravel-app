<?php

namespace App\Constants;

use App\Constants\Concerns\AvailableAsDropdownOptions;
use App\Constants\Concerns\CanBeRandomized;

enum Permission: string
{
    use AvailableAsDropdownOptions;
    use CanBeRandomized;

    // Talent permissions
    case VIEW_OWN_PROFILE = 'view_own_profile';
    case EDIT_OWN_PROFILE = 'edit_own_profile';
    case CREATE_POSTS = 'create_posts';
    case VIEW_CONNECTIONS = 'view_connections';
    case REQUEST_CONNECTIONS = 'request_connections';
    case ACCEPT_CONNECTIONS = 'accept_connections';
    case VIEW_MESSAGES = 'view_messages';
    case SEND_MESSAGES = 'send_messages';

    // Scout permissions
    case VIEW_ALL_TALENTS = 'view_all_talents';
    case SEARCH_TALENTS = 'search_talents';
    case CREATE_SCOUTING_REPORTS = 'create_scouting_reports';
    case INVITE_TO_TRIALS = 'invite_to_trials';
    case VIEW_TALENT_ANALYTICS = 'view_talent_analytics';
    case MANAGE_CONNECTIONS = 'manage_connections';

    // Club permissions
    case VIEW_CLUB_DASHBOARD = 'view_club_dashboard';
    case MANAGE_CLUB_PROFILE = 'manage_club_profile';
    case POST_JOB_OPENINGS = 'post_job_openings';
    case VIEW_APPLICATIONS = 'view_applications';
    case MANAGE_TRIALS = 'manage_trials';
    case VIEW_CLUB_ANALYTICS = 'view_club_analytics';

    // Admin permissions
    case VIEW_ADMIN_PANEL = 'view_admin_panel';
    case MANAGE_USERS = 'manage_users';
    case MANAGE_ROLES = 'manage_roles';
    case MANAGE_PERMISSIONS = 'manage_permissions';
    case VIEW_SYSTEM_ANALYTICS = 'view_system_analytics';
    case MANAGE_CONTENT = 'manage_content';

    /**
     * Get base permissions that all users should have
     */
    private static function getBasePermissions(): array
    {
        return [
            self::VIEW_OWN_PROFILE->value,
            self::EDIT_OWN_PROFILE->value,
            self::CREATE_POSTS->value,
            self::VIEW_CONNECTIONS->value,
            self::REQUEST_CONNECTIONS->value,
            self::ACCEPT_CONNECTIONS->value,
            self::VIEW_MESSAGES->value,
            self::SEND_MESSAGES->value,
        ];
    }

    /**
     * Get scout-specific permissions
     */
    private static function getScoutSpecificPermissions(): array
    {
        return [
            self::VIEW_ALL_TALENTS->value,
            self::SEARCH_TALENTS->value,
            self::CREATE_SCOUTING_REPORTS->value,
            self::INVITE_TO_TRIALS->value,
            self::VIEW_TALENT_ANALYTICS->value,
            self::MANAGE_CONNECTIONS->value,
        ];
    }

    /**
     * Get club-specific permissions
     */
    private static function getClubSpecificPermissions(): array
    {
        return [
            self::VIEW_CLUB_DASHBOARD->value,
            self::MANAGE_CLUB_PROFILE->value,
            self::POST_JOB_OPENINGS->value,
            self::VIEW_APPLICATIONS->value,
            self::MANAGE_TRIALS->value,
            self::VIEW_CLUB_ANALYTICS->value,
        ];
    }

    /**
     * Get admin-specific permissions
     */
    private static function getAdminSpecificPermissions(): array
    {
        return [
            self::VIEW_ADMIN_PANEL->value,
            self::MANAGE_USERS->value,
            self::MANAGE_ROLES->value,
            self::MANAGE_PERMISSIONS->value,
            self::VIEW_SYSTEM_ANALYTICS->value,
            self::MANAGE_CONTENT->value,
        ];
    }

    /**
     * Get permissions grouped by role
     */
    public static function getPermissionsByRole(): array
    {
        $basePermissions = self::getBasePermissions();
        $scoutSpecific = self::getScoutSpecificPermissions();
        $clubSpecific = self::getClubSpecificPermissions();
        $adminSpecific = self::getAdminSpecificPermissions();

        $talentPermissions = $basePermissions;

        $scoutPermissions = array_merge($basePermissions, $scoutSpecific);

        $clubPermissions = array_merge($basePermissions, $clubSpecific);

        $adminPermissions = array_unique(array_merge(
            $scoutPermissions,
            $clubPermissions,
            $adminSpecific
        ));

        return [
            UserRole::TALENT->value => $talentPermissions,
            UserRole::SCOUT->value => $scoutPermissions,
            UserRole::CLUB->value => $clubPermissions,
            UserRole::ADMIN->value => $adminPermissions,
        ];
    }

    /**
     * Get all unique permissions
     */
    public static function getAllPermissions(): array
    {
        return array_unique(array_merge(...array_values(self::getPermissionsByRole())));
    }
}
