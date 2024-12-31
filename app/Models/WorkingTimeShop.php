<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkingTimeShop extends Model
{

    protected $table = "working_time_shops";

    protected $fillable = [
        "shop_id",
        "day_of_week",
        "opening_time",
        "closing_time"
    ];

}

