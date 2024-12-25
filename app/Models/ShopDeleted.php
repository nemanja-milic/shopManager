<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopDeleted extends Model
{
    protected $table = "deleted_shops";

    protected $fillable = [
        "shop_id",
        "name",
        "country_id",
        "city",
        "street",
    ];
}
