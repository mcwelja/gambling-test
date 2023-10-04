<?php

namespace App\DTO;

use JsonSerializable;

class People implements JsonSerializable
{
    public function __construct(
        public readonly string $affiliateId,
        public readonly string $name,
        public readonly float $latitude,
        public readonly float $longitude
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->affiliateId,
            'name' => $this->name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude
        ];
    }
}
