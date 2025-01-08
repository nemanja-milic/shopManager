<?php

namespace App\DataTransferObjects;

class ShopDeletedTDO
{
    public function __construct(
        protected int $shop_id,
        protected string $name,
        protected int $country_id,
        protected string $city,
        protected string $street,
    ) {
        $this->name = $name;
        $this->country_id = $country_id;
        $this->city = $city;
        $this->street = $street;
    }

    public function toArray(): array
    {
        return [
            "shop_id" => $this->shop_id,
            "name" => $this->name,
            "country_id" => $this->country_id,
            "city" => $this->city,
            "street" => $this->street,
        ];
    }
}
