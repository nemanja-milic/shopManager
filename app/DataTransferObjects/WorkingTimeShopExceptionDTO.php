<?php

namespace App\DataTransferObjects;

class WorkingTimeShopExceptionDTO
{
    public function __construct(
        public array|string $reason,
        public array|string $date,
        public array|string $isWorking,
        public array|string $openingTime,
        public array|string $closingTime,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            $data["reason"] ?? [],
            $data["date"] ?? [],
            $data["is_working"] ?? [],
            $data["opening_time"] ?? [],
            $data["closing_time"] ?? []
        );
    }
}
