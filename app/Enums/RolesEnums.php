<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum RolesEnums :string
{
    use EnumToArrayTrait;

    case ADMIN = "admin";
    case MANAGER = "manager";
    case EMPLOYEE = "employee";
}
