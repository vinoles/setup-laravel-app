<?php

namespace App\Constants;

use App\Constants\Concerns\AvailableAsDropdownOptions;
use App\Constants\Concerns\CanBeRandomized;

enum UserRole: string
{
    use AvailableAsDropdownOptions;
    use CanBeRandomized;

    case USER = 'user';
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super_admin';
}
