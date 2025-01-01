<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingTimeShop extends Model
{
    use HasFactory;

    protected $table = "working_time_shops";

    protected $fillable = [
        "shop_id",
        "day_of_week",
        "opening_time",
        "closing_time"
    ];

    public function scopeGetWorkingTimeForShop(Builder $query, int $shopId) :Builder
    {
       return $query->where("shop_id", $shopId);
    }

}

