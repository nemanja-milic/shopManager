<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum DaysInWeek :string
{
    use EnumToArrayTrait;

    case MONDAY = "monday";
    case TUESDAY = "tuesday";
    case WEDNESDAY = "wednesday";
    case THURSDAY = "thursday";
    case FRIDAY = "friday";
    case SUNDAY = "sunday";
    case SATURDAY = "saturday";

}
