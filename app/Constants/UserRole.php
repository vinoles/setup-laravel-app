<?php

namespace App\Constants;

use App\Constants\Concerns\AvailableAsDropdownOptions;
use App\Constants\Concerns\CanBeRandomized;

enum UserRole: string
{
    use AvailableAsDropdownOptions;
    use CanBeRandomized;

    case TALENT = 'talent';
    case SCOUT = 'scout';
    case CLUB = 'club';
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super_admin';
}
