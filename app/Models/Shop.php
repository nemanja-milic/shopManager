<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{

    protected $fillable = [
        "name",
        "city",
        "street",
        "country_id"
    ];

    public function country() :BelongsTo
    {
        return $this->belongsTo(Country::class, "country_id", "id");
    }

}
