<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class WorkingTimeShopException extends Model
{
    protected $fillable = [
        "shop_id",
        "reason",
        "date",
        "is_working",
        "opening_time",
        "closing_time"
    ];

    protected function casts(): array
    {
        return [
            'is_working' => 'boolean',
        ];
    }

    protected function is_working(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => $value === "false" ? 0 : 1,
        );
    }
}
